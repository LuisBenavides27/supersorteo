@extends('adminlte::page')

@section('title', 'Supergiros')

@section('content_header')
    <h1 class="small">Registra el nombre del sorteo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <div class="alert alert-light" role="alert">
                <h4 class="alert-heading">¡NOTA IMPORTANTE!</h4>
                <p>Nombra tu sorteo con la siguiente estructura : <br>
                    <li>Sorteo</li> 
                    <li>Premio</li>
                    <li>Zona</li> 
                    Ejemplo : Sorteo Bono Pasto
                </p>
                
              </div>

            {!! Form::open(['route' => 'admin.sorteos.store']) !!}
                
                 {!! Form::hidden('user_id', auth()->user()->id)!!}
                {!! Form::hidden('status','1')!!} 

                <div class="form-group">
                    {!! Form::label('name','Nombre del Sorteo') !!}    
                    {!! Form::text('name', null,['class' => 'form-control','placeholder' => 'Estrucutura del nombre => Sorteo - Premio - Zona','required']) !!}    
                    
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror

                    
                </div>
                    {!! Form::submit('Crear Sorteo',['class' => 'btn btn-primary btn-lg']) !!}

            {!! Form::close() !!}        
        </div>
    </div>
@stop
@section('css')
    <style>        
        h1.small {
            font-family:Cambria;
            font-size: 40px;
            text-align: center;
        }
      </style>
@stop