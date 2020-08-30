@extends('adminlte::page')



@section('title', 'Fabricantes')

@section('content_header')
<div class="card">
    <div class="card-header">
     <b> Atualizar dados <b>
    </div>
    <div class="card-body">
            <form action="/fabricantes/{{$fabricantes->id}}" method="POST">
            @method('DELETE')
            @csrf
                <input class="btn btn-danger" type="submit" value="Sim">
            </form>

            <a class="btn btn-primary" href="/api">Não</a>


    </div>
  </div>
@stop

@section('content')

@stop

@section('css')

@stop

@section('js')

@stop
