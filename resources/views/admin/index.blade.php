@extends('adminlte::page')

@section('title', 'Supergiros')

@section('content_header')
    {{-- <h1>Pagina principal administrador</h1> --}}
@stop

@section('content')
<div class="card">
    <div class="card-body">

            </a></p>

            <p class="s"><a class="s" href="">
              SUPERGIROS
            </a></p>
          
         
    </div>
</div>


@stop

@section('css')
   
    <style>
        @font-face {
  font-family: 'Monoton';
  font-style: normal;
  font-weight: 400;
  src: local('Monoton'), local('Monoton-Regular'), url(http://themes.googleusercontent.com/static/fonts/monoton/v4/AKI-lyzyNHXByGHeOcds_w.woff) format('woff');
}

@font-face {
  font-family: 'Iceland';
  font-style: normal;
  font-weight: 400;
  src: local('Iceland'), local('Iceland-Regular'), url(http://themes.googleusercontent.com/static/fonts/iceland/v3/F6LYTZLHrG9BNYXRjU7RSw.woff) format('woff');
}

@font-face {
  font-family: 'Pacifico';
  font-style: normal;
  font-weight: 400;
  src: local('Pacifico Regular'), local('Pacifico-Regular'), url(http://themes.googleusercontent.com/static/fonts/pacifico/v5/yunJt0R8tCvMyj_V4xSjafesZW2xOQ-xsNqO47m55DA.woff) format('woff');
}

@font-face {
  font-family: 'Audiowide';
  font-style: normal;
  font-weight: 400;
  src: local('Audiowide'), local('Audiowide-Regular'), url(http://themes.googleusercontent.com/static/fonts/audiowide/v2/8XtYtNKEyyZh481XVWfVOj8E0i7KZn-EPnyo3HZu7kw.woff) format('woff');
}

@font-face {
  font-family: 'Vampiro One';
  font-style: normal;
  font-weight: 400;
  src: local('Vampiro One'), local('VampiroOne-Regular'), url(http://themes.googleusercontent.com/static/fonts/vampiroone/v3/Ho2Xld8UbQyBA8XLxF1_NYbN6UDyHWBl620a-IRfuBk.woff) format('woff');
}

body{
  background-color: #222222;
}
/*neon effect*/
p.s{
  text-align:center;
  font-size:7em;
  margin:20px 0 20px 0;
}

a.s{
  text-decoration:none;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  transition: all 0.5s;
}


p:nth-child(2) a{
  font-size:1.5em;
  color:#228DFF;
  font-family:Audiowide;
}
p:nth-child(2) a:hover{
  -webkit-animation: neon2 1.5s ease-in-out infinite alternate;
  -moz-animation: neon2 1.5s ease-in-out infinite alternate;
  animation: neon2 1.5s ease-in-out infinite alternate;
}


p a:hover{
color:#ffffff;
}



/*glow for webkit-ket-frames*/

@-webkit-keyframes neon2 {
  from {
    text-shadow: 0 0 10px #fff,
               0 0 20px  #fff,
               0 0 30px  #fff,
               0 0 40px  #228DFF,
               0 0 70px  #228DFF,
               0 0 80px  #228DFF,
               0 0 100px #228DFF,
               0 0 150px #228DFF;
  }
  to {
    text-shadow: 0 0 5px #fff,
               0 0 10px #fff,
               0 0 15px #fff,
               0 0 20px #228DFF,
               0 0 35px #228DFF,
               0 0 40px #228DFF,
               0 0 50px #228DFF,
               0 0 75px #228DFF;
  }
}




/*glow for mozilla-keyframes*/

@-moz-keyframes neon2 {
  from {
    text-shadow: 0 0 10px #fff,
               0 0 20px  #fff,
               0 0 30px  #fff,
               0 0 40px  #228DFF,
               0 0 70px  #228DFF,
               0 0 80px  #228DFF,
               0 0 100px #228DFF,
               0 0 150px #228DFF;
  }
  to {
    text-shadow: 0 0 5px #fff,
               0 0 10px #fff,
               0 0 15px #fff,
               0 0 20px #228DFF,
               0 0 35px #228DFF,
               0 0 40px #228DFF,
               0 0 50px #228DFF,
               0 0 75px #228DFF;
  }
}



/*glow*/

@keyframes neon2 {
  from {
    text-shadow: 0 0 10px #fff,
               0 0 20px  #fff,
               0 0 30px  #fff,
               0 0 40px  #228DFF,
               0 0 70px  #228DFF,
               0 0 80px  #228DFF,
               0 0 100px #228DFF,
               0 0 150px #228DFF;
  }
  to {
    text-shadow: 0 0 5px #fff,
               0 0 10px #fff,
               0 0 15px #fff,
               0 0 20px #228DFF,
               0 0 35px #228DFF,
               0 0 40px #228DFF,
               0 0 50px #228DFF,
               0 0 75px #228DFF;
  }
}

    </style>
@stop

@section('js')
@include('sweetalert::alert')
<style>
    .img-container {
      text-align: center;

    }
  </style>
@stop