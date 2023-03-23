@extends('adminlte::page')

@section('title', 'Supergiros')

@section('content_header')

    <h1 class="small">{{ $sorteo->name }}</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('danger'))
                <div class="alert alert-danger" role="alert">
                    {{ session('danger') }}
                </div>
            @endif

            <div class="cont">
                <img class="img-container" src="{{ asset('/storage/fondo.jpg') }}">
            </div>

            <br>

            <div class="card header">
                <a class="btn btn-outline-primary btn-lg" href="{{ route('admin.sorteos.ganador', $sorteo) }}">
                    SELECCIONAR GANADOR</a>
            </div>

            <br>

            <div class="card header">
                {{-- <form  action="{{route('admin.sorteos.finalizar', $sorteo)}}"> --}}
                <a class="btn btn-outline-danger btn-lg" href="{{ route('admin.sorteos.finalizar', $sorteo) }}">
                    FINALIZAR SORTEO</a>
                {{-- </form> --}}
            </div>

        </div>
    </div>
@stop

@section('css')

    <style>
        .cont {
            text-align: center;
        }

        .img-container {
            width: 50%;
            height: 50%;
            background-position: center;
        }

        h1.small {
            font-variant: Cambria;
            font-size: 40px;
            text-align: center;
        }
    </style>
@stop