@extends('adminlte::page')

@section('title', 'Supergiros')

@section('content_header')
    <h1 class="small">GESTION DE USUARIOS</h1>  
@stop

@section('content')
   
    @if (session('info'))
    <div class="alert alert-success">
        <strong>
        {{ session('info') }} 
        </strong>
    </div>
    @endif

    @if (session('danger'))
    <div class="alert alert-danger">
    <strong>
        {{ session('danger') }} 
    </strong>
    </div>
    @endif

    @livewire('usuarios')
 
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

