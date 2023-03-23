@extends('adminlte::page')

@section('title', 'Supergiros')

@section('content_header')
    <h1 class="small">ASIGNAR ROLES</h1>  
@stop

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <h1>ASIGNAR ROLES </h1>
                    <br><br>
                    @if (session('info'))
                        <div class="alert alert-success">
                            <strong>
                            {{ session('info') }} 
                            </strong>
                        </div>
                    @endif
                <div class="card-body">
                        <p class="">Nombre:</p>
                        <p class="form-control">{{$usuario->name}}</p>
                        <br>
                        <h2 class="h5">Listado de roles</h2>
                        {!! Form::model($usuario,['route' => ['admin.usuarios.update', $usuario], 'method' => 'put']) !!}
                            @foreach ($roles as $role)
                                <div>
                                    <label>
                                        {!! Form::checkbox('roles[]', $role->id, null,['class' => 'mr-1']) !!}
                                        {{$role->name}}
                                    </label>
                                </div>
                            @endforeach
                            {!! Form::submit('Asignar Rol',['class' => 'btn btn-primary mt-2']) !!}
                        {!! Form::close() !!}
                    </div>
                    <br><br>
            </div>
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
