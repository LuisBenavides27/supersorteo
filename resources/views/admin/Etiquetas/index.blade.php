@extends('adminlte::page')

@section('title', 'Supergiros')

@section('content_header')
    <h1 class="small">GESTION DE ETIQUETAS</h1>  
@stop

@section('content')

     @livewire('etiquetas') 
 
    
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
@section('js')
 {{-- @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])   --}}
  @include('sweetalert::alert')  
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

<script>
    $('.delete-confirm').click(function(event){
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
            title: `Estas seguro que deseas eliminar la etiqueta ${name}`,
            text: "Esta es una opcion permanente y no se podra revertir",
            icon: 'warning',
            showCancelButton: true,            
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar',
            cancelButtonText: 'No, cancelar!'
            }).then((result) => {
            if (result.isConfirmed) {         
                form.submit()       
            }            
        });
    });
</script>
@stop