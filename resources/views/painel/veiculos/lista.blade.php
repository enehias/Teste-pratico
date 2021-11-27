@extends('layouts.app')

@section('content')
    <div class="container">
        {{isAdmin()}}
        <h1 class="d-flex justify-content-center">{{$titulo??""}}</h1>
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Placa</th>
                    <th>Renavam</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Ano</th>
                    <th>Proprietário</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
            @foreach($veiculos as $veiculo)
                <tr>
                    <td>{{$veiculo->id}}</td>
                    <td>{{$veiculo->placa}}</td>
                    <td>{{$veiculo->renavam}}</td>
                    <td>{{$veiculo->modelo}}</td>
                    <td>{{$veiculo->marca}}</td>
                    <td>{{$veiculo->ano}}</td>
                    <td>{{$veiculo->dono->name}}</td>
                    <td>
                        @if(isAdmin())
                        <a href="{{route('veiculos.editar',['id'=>$veiculo->id])}}"
                           class="btn btn-sm bg-primary text-dark">
                            Alterar
                        </a>
                        <button
                                type="button"
                                class="btn btn-sm bg-danger"
                                route-delete="{{route('veiculos.deletar',['id'=>$veiculo->id])}}"
                                onclick='event.preventDefault();deleteGlobal(this);'
                        >Deletar
                        </button>
                        @else
                            SEM PERMISSÃO
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection