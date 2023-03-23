<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>SuperGiros | Sorteos</title>
</head>
<body class="body">
    
    <div>
        
        {{-- <img src="{{ asset ('/storage/sorteo.jpg')}}" > --}}

    </div>
        
        {{-- <div class="marca-de-agua"> 
            <h1 class="small">BIENVENIDOS</h1>
             <img src="{{ asset ('/storage/sorteo.jpg')}}" > 
            <br><br> --}}
            @if (Auth::check()) 
                <a class="btn btn-outline-primary btn-lg new" href="{{route('admin.home')}}">DASHBOARD</a>          
            @else
                <a class="btn btn-outline-primary btn-lg new" href="{{route('admin.home')}}">INGRESAR</a>
            @endif

         </div> 
  
    
</body>
</html>

<style>
    .body{
       /* background-color: rgb(17, 38, 153);*/
        background-image: url('/storage/fondo.jpg');
        background-repeat: no-repeat;
        background-size: cover;        
        /* background-position: center ; */
    }
        .img-container {          
            width: 60%;
            height: 60%; 
        }
        .cont{
            text-align: center;
        }
        h1.small{
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 50px;
        } 
          a.new  {
            position: absolute;
            bottom:4em;
            right:4em;
            background-color:#8F0005;
            border-radius:1.5em;
            color:white;
            text-transform:uppercase;
            padding:1em 1.5em;
            }


            @media only screen and (max-width:600px) {
            .body{
                display:inline-block;
                margin-bottom:2em;
            }
           
            a.new {
                position:relative;
                bottom:0em;
                right:-2em;
                background-color:#8F0005;
                color:white;
                font-size:1em;
                padding:1em 1.5em;
                text-transform:uppercase;
                border-color:white;
                border-radius:1.5em;
                }
            }
</style> 

