@extends('adminlte::page')

@section('title', 'Supergiros')

@section('content_header')
    <h1 class="small"> GENERAR REPORTES DE CLIENTES GANADORES </h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body" align="center">

            <div class="alert alert-light" role="alert">
                <h4 class="alert-heading">¡GENERA EL REPORTE DE CLIENTES GANADORES!</h4>
                <p>Aqui puedes generar reporte de clientes ganadores relacionados con un etiqueta: <br>
                    <li>Recuerda finalizar todos los sorteos asignados a la etiqueta</li>
                    <li>Si deseas reporte de un solo sorteo, regresa a la pagina de gestion</li>
                    <li>Puedes generar este reporte las veces que quieras</li>
                    
                </p>
            </div>
           
            <form action="{{route('admin.clientes.repo')}}" method="post"> 
                @csrf            
                                  
                    <select name="etiqueta" class="form-select" aria-label="Default select example" required>
                        <option value="" selected>-- Seleccione Etiqueta --</option>
                        
                            @foreach ($grupos as $grupo)
                                <option value="{{$grupo->id}}">{{$grupo->name}}</option>
                            @endforeach               
                    </select>
                    <br><br>
                <button type="submit" class="btn btn-primary ">GENERAR REPORTE</button>
            </form> 

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