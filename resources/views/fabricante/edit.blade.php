@extends('adminlte::page')



@section('title', 'Fabricantes')

@section('content_header')
<div class="card">
    <div class="card-header">
     <b> Atualizar dados <b>
    </div>
    <div class="card-body">
            <form action="/fabricantes/{{$fabricantes->id}}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
              <label for="nome">Nome do Fabricante</label>
            <input type="text" class="form-control" name="nome" placeholder="Informe o nome do Fabricante" value="{{$fabricantes->nome}}">
            </div>
            <div class="form-group">
              <label for="site">Site do Fabricante </label>
              <input type="text" class="form-control" name="site" placeholder="Informe o site"  value="{{$fabricantes->site}}">
            </div>

            <button class="btn btn-primary" type="submit">SALVAR</button>
            <a class="btn btn-danger" href="/fabricantes">CANCELAR</a>
     </form>

    </div>
  </div>
@stop

@section('content')

@stop

@section('css')

@stop

@section('js')

@stop
