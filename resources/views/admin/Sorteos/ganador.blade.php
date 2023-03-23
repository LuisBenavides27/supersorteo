@extends('adminlte::page')

@section('title', 'Supergiros')

@section('content_header')
    <h1 class="small">{{$sorteo->name}}</h1>  
@stop

@section('content')

    <div class="card">
        <div class="card-body">      
            <div class="card header">
             
                <div class="cont" id="mostrar" >
                    <img class="img-container2" src="{{ asset ('/storage/gira.gif')}}" >                   
                </div>        
               
                <div class="cont" id="ocultar" style="display: none">
                    <img class="img-container" src="https://cardoc.cl/wp-content/uploads/2016/03/ganador.jpg" >
                    <br><br><br>
                    <label for="ganador" class="form-control form-control-lg">↓↓  CLIENTE GANADOR  ↓↓</label>                    
                    <input name="ganador" class="form-control form-control-lg center" type="text" value="{{$ganador->name}}" readonly>
                    <br>
                    <label for="ganador" class="form-control form-control-lg">↓↓  ZONA  ↓↓</label>
                    <input name="ganador" class="form-control form-control-lg center" type="text" value="{{$ganador->zone}}" readonly>
                    <br><br>
                    <a class="btn btn-outline-primary btn-lg" href="{{route('admin.clientes.estado',[$ganador,$sorteo])}}">CONTINUAR SORTEO</a>
                </div>                

            </div>
        </div> 
    </div>
    
@stop

@section('css')
    <style>
        .img-container {          
           width: 20%;
          height: 20%; 
        }
        .img-container2 {          
           width: 45%;
          height: 45%; 
        }
        h1.small {
            font-variant: Cambria;
            font-size: 50px;
            text-align: center;
        }
        input.center{
            text-align: center;
        }
        .cont{
            text-align: center;
            
        }  
        .wrappers {
            display: flex;
            }

      </style>
@stop

@section('js')
{{-- @include('sweetalert::alert')  
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  --}}
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
<script>

    setTimeout(ocultar, 4000);
    
    function ocultar() {
        var x = document.getElementById("mostrar");
        var y = document.getElementById("ocultar");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }

        if (y.style.display === "none") {
            
            y.style.display = "block";
        } else {
            y.style.display = "none";
        }
        
            var duration = 15 * 1000;
            var animationEnd = Date.now() + duration;
            var defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

            function randomInRange(min, max) {
            return Math.random() * (max - min) + min;
            }

            var interval = setInterval(function() {
            var timeLeft = animationEnd - Date.now();

            if (timeLeft <= 0) {
                return clearInterval(interval);
            }

            var particleCount = 50 * (timeLeft / duration);
            // since particles fall down, start a bit higher than random
            confetti(Object.assign({}, defaults, { particleCount, origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 } }));
            confetti(Object.assign({}, defaults, { particleCount, origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 } }));
            }, 250);


    }
</script> 
    
@stop 