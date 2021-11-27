<?php

namespace App\Listeners;

use App\Events\EventAlterSaveVeiculo;
use App\Notifications\CustomerNotification;
use Illuminate\Support\Facades\Notification;

class ListenerAlterSaveVeiculo
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EventAlterSaveVeiculo  $event
     * @return void
     */
    public function handle(EventAlterSaveVeiculo $event)
    {
        $fromName = env('APP_NAME');
        $fromEmail = env('MAIL_USERNAME');
        $dados = json_encode($event->veiculo);
        $event->veiculo->notify(new CustomerNotification($fromName,$fromEmail,
            "AVISO MODIFICAÇÃO DE DADOS",
            "Dados: {$dados}"));

    }
}
