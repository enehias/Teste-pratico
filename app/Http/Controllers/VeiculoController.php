<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestVeiculo;
use App\Response\Error;
use App\Response\Success;
use App\User;
use App\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    private $model;
    public function __construct(Veiculo $veiculo)
    {
        $this->model = $veiculo;
    }

    public function index(Request $request)
    {
        $titulo = "Listagem de Veículos";
        $veiculos = $this->model->orderBy('id')->get();
        return view('painel.veiculos.lista',compact('titulo','veiculos'));
    }

    public function create(Request $request)
    {
        $titulo = "Cadastro de Veículos";
        $proprietarios = User::where('role','=',1)->orderBy('name')->get();
        return view('painel.veiculos.cadastro',compact('titulo','proprietarios'));
    }
    public function store(RequestVeiculo $request)
    {
        try {
            $veiculo = $this->model->create($request->all());
            return Success::generic($veiculo,messageSuccess('20000','Veículo'),
                "web",route("veiculos.listar"));
        }catch (\Exception $e){
            return Error::generic(null,messageErrors('1000','Veículo'));
        }
    }

    public function update(Request $request,$id){

        $veiculo = $this->model->find($id);
        $proprietarios = User::where('role','=',1)->orderBy('name')->get();
        $titulo = "Atualização de Veículo";
        if(!$veiculo)
            return Error::generic(
                null,
                messageErrors(1004, "Veículo"),
                "web"
            );
        return view('painel.veiculos.editar',compact("titulo","veiculo","proprietarios"));
    }
    public function updated(RequestVeiculo $request,$id)
    {
        try {

            $veiculo = $this->model->find($id)->update($request->all());
            return Success::generic($veiculo,messageSuccess('20001','Veículo'),
                "web",route("veiculos.listar"));
        }catch (\Exception $e){
            return Error::generic($e->getMessage(),messageErrors('1001','Veículo'));
        }
    }

    public function destroy(Request $request,$id)
    {
        try {

            $veiculo = $this->model->find($id)->delete();
            return Success::generic($veiculo,messageSuccess('20002','Veículo'),
                "web",route("veiculos.listar"));
        }catch (\Exception $e){
            return Error::generic(null,messageErrors('1002','Veículo'));
        }
    }
}
