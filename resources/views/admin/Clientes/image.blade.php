@extends('adminlte::page')

@section('title', 'Supergiros')

@section('content_header')
    <h1 class="small">Registra el nombre del sorteo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <div class="alert alert-light" role="alert">
                <h4 class="alert-heading">¡SUBE TU IMAGEN!</h4>
                <p>Recuereda subir tu imagen con alguna extesion : <br>
                    <li>.JPG</li>
                    <li>.PNG</li>
                    <li>.GIF</li>
                </p>
            </div>
            {{ $sorteo }}

            <form action="{{ route('admin.clientes.store') }}" method="POST">
                @csrf
                <input type="hidden" value="">
                <div class="form-group">
                    <input type="file" name="img" required>
            
                    @error('img')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <button class="btn btn-primary btn-lg" type="submit">SUBIR IMAGEN</button>
            </form>

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