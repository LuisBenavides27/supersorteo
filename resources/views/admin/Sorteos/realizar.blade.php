@extends('adminlte::page')

@section('title', 'Supergiros')

@section('content_header')
    <h1 class="small">REALIZAR SORTEOS</h1>
@stop

@section('content')

    @livewire('realizar', ['sorteos' => $sorteos])
    
@stop
@section('css')
    <style>        
        h1.small {
            font-family:Cambria;
            font-size: 60px;
            text-align: center;
        }
        
        h2.size{
            font-family:sans-serif;
            font-size: 30px;
            text-align: center;
        }

        .img-container {          
           width: 55%;
          height: 55%; 
        }
        .cont{
            text-align: center;
        }
      </style>
@stop