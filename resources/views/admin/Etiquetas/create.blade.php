@extends('adminlte::page')

@section('title', 'Supergiros')

@section('content_header')
    <h1 class="small">CREAR ETIQUETAS</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <div class="alert alert-light" role="alert">
                <h4 class="alert-heading">¡CREA UNA ETIQUETA PARA TUS SORTEOS!</h4>
                <p>Recuerda que la etiqueta es unica, procura crearla con una estructura identificable, aqui algunos ejemplos: <br>
                    <li>Sorteo_Astro_Enero</li>
                    <li>Sorteo para astro</li>
                    <li>Astro_001</li>
                    <li>Astro 1</li>
                </p>
            </div>
           
            {!! Form::open(['route' => 'admin.etiquetas.store']) !!}
                
            {!! Form::hidden('user_id', auth()->user()->id)!!}

                <div class="form-group">
                    {!! Form::label('name','Nombre de la Etiqueta') !!}    
                    {!! Form::text('name', null,['class' => 'form-control','placeholder' => 'Sugenrencia para etiquetas => Sorteo - mes - dia','required']) !!}    
                    
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                    
                </div>
            {!! Form::submit('Crear Etiqueta',['class' => 'btn btn-primary btn-lg']) !!}
            {!! Form::close() !!}        

        </div>
    </div>
@stop
@section('css')
    <style>
        h1.small {
            font-family: Cambria;
            font-size: 40px;
            text-align: center;
        }
    </style>
@stop