@extends('adminlte::page')

@section('title', 'Fabricantes')

@section('content_header')

@stop

@section('content')
<a class="btn btn-primary" href="{{route('fabricantes.create')}}">Criar Novo</a> <br><br>

<div class="card">
    <h5 class="card-header"><b> Fabricantes Cadastrados <b> </h5>
    <div class="card-body">

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>

                    <th scope="col"> ID </th>
                    <th scope="col">Nome</th>
                    <th scope="col">Site</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>

                @foreach ($fabricantes as $fabricante)

                <tr>
                    <td>{{$fabricante->id}}</td>
                    <td>{{$fabricante->nome}}</td>
                    <td>{{$fabricante->site}}</td>
                    <td>

                    <a class="btn btn-primary" href="{{route('fabricantes.edit',$fabricante->id)}}">Editar</a>
                        <br>
                        <br>
                    <form action="/fabricantes/{{$fabricante->id}}" method="post" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($fabricante->nome )}}?')">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger " type="submit" value="Excluir">
                    </form>
                    </td>
                </tr>


                @endforeach
          </table>

    </div>
  </div>
@stop

@section('css')

@stop

@section('js')

@stop
