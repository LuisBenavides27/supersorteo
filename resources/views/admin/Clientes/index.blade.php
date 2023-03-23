@extends('adminlte::page')

@section('title', 'Supergiros')

@section('content_header')
    <h1 class="small">CLIENTES GANADORES </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>CEDULA</th>
                        <th>NOMBRE</th>
                        <th>ZONA</th>
                        <th>CELULAR</th>
                        <th>SORTEO</th>
                    </tr>
                </thead>
                <tbody>                                                                            
                         @foreach ($clientes as $cliente)                            
                            <tr>
                                <td>{{$cliente->cedula}}</td>
                                <td>{{$cliente->cliente}}</td>
                                <td>{{$cliente->zone}}</td>
                                <td>{{$cliente->phone}}</td>
                                <td>{{$cliente->sorteo}}</td>
                            </tr>
                        @endforeach  
                </tbody>
            </table> 
            
        </div>
    </div>
    <div class="row">{{ $clientes->links() }} </div>
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