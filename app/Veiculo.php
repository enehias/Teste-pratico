<?php

namespace App;

use App\Events\EventAlterSaveVeiculo;
use App\Scopes\UserProprietarioScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Veiculo extends Model
{
    use Notifiable;
    use softDeletes;
    protected $fillable = [
        'placa','renavam','modelo',
        'marca','ano','proprietario'
    ];

    public function routeNotificationForMail()
    {
        return $this->dono->email;
    }

    protected $dates = ['deleted_at'];


    protected $dispatchesEvents = [
        'saved' => EventAlterSaveVeiculo::class,
    ];
    protected function fireCustomModelEvent($event, $method)
    {
        if (! isset($this->dispatchesEvents[$event])) {
            return;
        }
        $result = static::$dispatcher->$method(new $this->dispatchesEvents[$event]($this));
        if (! is_null($result)) {
            return $result;
        };
    }

    /**
     * Inicio SCOPES
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new UserProprietarioScope());
    }
    /**
     * FIM SCOPES
     */
    /**
     * Inicio Relacionamentos
     */
    public function dono(){
        return $this->hasOne(User::class,"id","proprietario");
    }
    /**
     * Fim Relacionamentos
     */
}
