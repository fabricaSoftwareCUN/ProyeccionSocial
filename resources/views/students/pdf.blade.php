<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificado de {{ Str::title($nombre_producto) }}</title>
    <link href="{{ env('APP_URL') }}css/certificados.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    {{-- FONTS GOOGLE --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,500&family=Parisienne&display=swap" rel="stylesheet">
    <style>
        body, html {
          font-family: 'Montserrat', sans-serif;
          font-size: 22px;
        }
    </style>
  </head>

<body>
  <header>
    <div class="div-img-left">
      <img src="{{env('APP_URL')}}images/Proyección Social - Fondo blanco.png" alt="cun-logo-proyeccion" width="250">
    </div>
    @if($logo==null)
    @else
    <div class="text-center div-img-center">
      <img src="{{env('APP_URL')}}images/aliados/{{$logo}}.png" alt="cun-logo-proyeccion" width="80">
    </div>
    @endif
    <div class="div-img-right">
      <img align="right" src="{{env('APP_URL')}}images/log1.png" alt="cun-logo" width="175">
    </div>
  </header>

  <main>
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-12 mt-4 titulo">
          <strong>
            LA COORDINACIÓN NACIONAL DE PROYECCIÓN SOCIAL
          </strong>
        </div>
        <div class="col-md-12 mt-3 subtitulo">
          CERTIFICA QUE:
        </div>
        <div class="col-md-12 mt-2 nombre">
          <strong>{{ Str::title($name) }}</strong>
        </div>
        <div class="col-md-12 mt-1">
          Identificado(a) con {{ Str::lower($tipo_documento) . '. No. ' . $numero_documento }}<br>
          Asistió y aprobó {{ Str::lower($tipo_producto) }}:
        </div>
        <div class="col-md-12 mt-3">
          <strong>
            <div><strong style="text-decoration: underline;font-size:26px;">{{$nombre_producto}}</strong></div>
          </strong>
        </div>
        <div class="mt-2">{{$fecha_realizado}}
          <br>Con una intensidad de {{ $duración }} horas
        </div>
        <div class="col-md-12 mt-2 t3">
          {{$Expedicion}}
        </div>
        @if($firma==null)
        <div class="mt-2 firmas">
          <div class="firma00">
            <div class="img-firma" >
              <img src="{{env('APP_URL')}}images/firmas/firma-liliana.png" alt="Firma digital">
            </div>
            <div style="font-size:14px;">
              <strong>{{__('nombreFirmaA')}}</strong>
              <br>{{__('cargoFirmaA')}} de
              <br>{{__('areaFirmaA')}}
            </div>
          </div>
        </div>
        @else
        <div class="firmas mt-2">
          <div class="firma01">
            <div class="img-firma" >
              <img src="{{env('APP_URL')}}images/firmas/firma-liliana.png" alt="Firma digital">
            </div>
            <div style="font-size:14px;>
              <strong>{{__('nombreFirmaA')}}</strong>
              <br>{{__('cargoFirmaA')}} de
              <br>{{__('areaFirmaA')}}
            </div>
          </div>
          <div class="firma02">
            <div class="img-firma">
              <img src="{{env('APP_URL')}}images/firmas/Fundación-ENOC.png" alt="Firma digital aliado">
            </div>
            <div style="font-size:14px;">
              <strong>Elena Vergara</strong>
              <br>Directora General  de
              <br>Fundación ENOC
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
    <div class="mt-5">
      <div class="footers">
        <div class="footer00">
          <div class="card">
            <div class="card-footer"></div>
          </div>
        </div>
        <div class="footer01 text-center">
          <div class="card">
            <div class="card-footer">
            <h2>{{ $consecutivo }}</h2>
            </div>
          </div>
        </div>
        <div class="footer02">
          <div class="qr-code">
            <a href="{{ $url_validate }}" target="_blank"><img src="data:image/svg+xml;base64, {!! base64_encode($qr) !!}" /></a>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>
