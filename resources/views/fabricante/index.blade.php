@extends('adminlte::page')

@section('title', 'Fabricantes')

@section('content_header')
    <h1>
        Fabricantes
    </h1>
@stop

@section('content')
<a class="btn btn-primary" href="{{route('fabricantes.create')}}">Criar Novo</a>
@stop

@section('css')

@stop

@section('js')
 
@stop