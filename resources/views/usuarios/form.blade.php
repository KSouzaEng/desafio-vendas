@extends('adminlte::page')

@section('title', 'Formulário de usuario')

@section('content_header')
    <h1>Formulário de usuario</h1>
@stop

@section('content')


    <div class="card card-primary">
        @if (isset($usuario))
            {!! Form::model($usuario, ['url' => route('usuarios.update', $usuario), 'method' => 'put']) !!}
        @else
            {!! Form::open(['url' => route('usuarios.store')]) !!}
        @endif
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('name', 'Nome') !!}
                    {!! Form::text('name', null, ['class' => 'form-control ']) !!}
                    @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'E-mail') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    @error('email')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Senha') !!}
                <div class="col col-lg-25">
                    {!! Form::password('password', null, ['class' => 'form-control']) !!}
                    @error('password')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop
@section('css')
@stop
