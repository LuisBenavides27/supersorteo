@extends('adminlte::page')

@section('title', 'Supergiros')

@section('content_header')
    <h1 class="small">Sube el archivo plano para {{$sorteo->name}}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">   
        @if (isset($errors) && $errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
            {{$error}}
            @endforeach
        </div>
        @endif
        
        <div class="alert alert-light" role="alert">
            <h4 class="alert-heading">¡NOTA IMPORTANTE!</h4>
            <p>Antes de subir el archivo, revisa que cumpla con los siguientes criterios:
                <li>El archivo debe tener a extension csv, xlsx o txt</li> 
                <li>El archivo NO debe tener encabezado</li>
                <li>El orden de los campos debe ser estrictamente : Cedula, Nombres, Zona y Celular</li>
                <li>Todos los campos deben estar llenos</li>            
                <li>Selecciona la etiqueta correspondiente antes de subir el archivo</li>            
                <li>Podras elegir subir el archivo solo una vez</li>            
            </p>
           
        </div>

    <form action="{{route('admin.sorteos.importar')}}" method="post" enctype="multipart/form-data"> 
        @csrf            
            <input type="file" name="documento" required> 
            <input type="hidden" value="{{$sorteo->id}}" name="clave">

            @error('file')                
                <small class="text-danger">{{$message}}</small>
            @enderror
            <br><br>

            <select name="etiqueta" class="form-select" aria-label="Default select example" required>
                <option value="" selected>-- Seleccione Etiqueta --</option>
                <option value="{{NULL}}" >SORTEO SIMPLE</option>
                    @foreach ($grupos as $grupo)
                        <option value="{{$grupo->id}}">{{$grupo->name}}</option>
                    @endforeach               
            </select>
            <br><br>
        <button type="submit" class="btn btn-primary ">Subir Archivo</button>
    </form> 
    </div>
</div>
@stop

@section('css')
<style>        
    h1.small {
        font-family:Cambria;
        font-size: 30px;
       
    }
  </style>
@stop

@section('js')
    
@stop