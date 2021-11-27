@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="d-flex justify-content-center">{{$titulo??""}}</h1>
        <form class="" action="{{route('veiculos.updated',['id'=>$veiculo->id])}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$veiculo->id}}">
            <div class="form-row">
                <div class="col">
                    <label for="nome">Proprietário:</label>
                    <select name="proprietario" class="{{ $errors->has('proprietario') ? ' is-invalid' : '' }} custom-select" aria-label="Default select example">
                        <option {{ $veiculo->proprietario == null ? "selected" : "" }} value="">Selecione o Proprietário</option>
                        @foreach($proprietarios as $proprietario)
                            <option {{ $veiculo->proprietario == $proprietario->id ? "selected" : "" }} value="{{$proprietario->id}}">{{$proprietario->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('proprietario'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('proprietario') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col">
                    <label for="nome">Renavam:</label>
                    <input type="text" class="form-control {{ $errors->has('renavam') ? ' is-invalid' : '' }}"
                           name="renavam" value="{{ $veiculo->renavam }}"
                           placeholder="Digite o renavam">
                    @if ($errors->has('renavam'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('renavam') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-2">
                    <label for="nome">Placa:</label>
                    <input type="text" class="form-control {{ $errors->has('placa') ? ' is-invalid' : '' }}"
                           name="placa" value="{{ $veiculo->placa }}" autofocus placeholder="Digite a placa"/>
                    @if ($errors->has('placa'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('placa') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="nome">Modelo:</label>
                    <input type="text" class="form-control {{ $errors->has('modelo') ? ' is-invalid' : '' }}"
                           name="modelo" value="{{ $veiculo->modelo }}" autofocus placeholder="Digite o modelo"/>
                    @if ($errors->has('modelo'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('modelo') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col">
                    <label for="nome">Marca:</label>
                    <input type="text" class="form-control {{ $errors->has('marca') ? ' is-invalid' : '' }}"
                           name="marca" value="{{ $veiculo->marca}}"
                           placeholder="Digite a marca">
                    @if ($errors->has('marca'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('marca') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-2">
                    <label for="nome">Ano:</label>
                    <input type="text" class="form-control {{ $errors->has('ano') ? ' is-invalid' : '' }}"
                           name="ano" value="{{ $veiculo->ano }}" autofocus placeholder="Digite o ano"/>
                    @if ($errors->has('ano'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('ano') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="mt-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-lg btn-success">Atualizar</button>
                <button type="reset" class="btn btn-lg btn-secondary ml-2">Limpar</button>
            </div>
        </form>
    </div>
@endsection