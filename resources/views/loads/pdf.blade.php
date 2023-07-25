<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Acta de cierre - {{$Acta_cierre_report}}</title>
  <link href="{{ env('APP_URL') }}css/acta_cierre.css" rel="stylesheet">
  {{-- <link href="{{ env('APP_URL') }}css/bootstrap.min.css" rel="stylesheet"> --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  {{-- FONTS GOOGLE --}}
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,500&display=swap" rel="stylesheet">
  <style>
    body, html {
      font-family: 'Montserrat', sans-serif;
      font-size: 18px;
    }
  </style>
</head>

<body>
  <header>
    <div class="div-img-right">
      <img align="right" src="{{env('APP_URL')}}images/logo-mineducacion.png" alt="cun-logo" width="175">
    </div>
  </header>

  <main>
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-12 mt-1 titulo">
          CORPORACIÓN UNIFICADA NACIONAL DE EDUCACIÓN SUPERIOR
        </div>
        <div class="col-md-12 mt-3 titulo">
          AREA DE FORMACIÓN CONTINUADA<br>
          ACTA DE CIERRE No.{{$Acta_cierre_report}}
          -PS-Digital
        </div>
      </div>
      <div class="col-md-12 mt-2 texto">
        La suscrita Coordinadora Nacional de Proyección Social de la Corporación Unificada
        Nacional de Educación Superior en uso de las facultades conferidas se permite certificar
        que las personas que se relacionan a continuación asistieron a {{$Tipo_producto_report}}
        <strong>{{$Nombre_producto_report}}</strong> en el área de Proyección Social, {{$fecha_realizado}},
        cumpliendo un total de {{$Duracion_report}} horas.
      </div>
      <div class="col-md-12 mt-3">
        <table class="table">
          <tr class="text-center align-middle">
            <th class="borde">N. de Consecutivo Único Nacional</th>
            <th class="borde">NOMBRES COMPLETOS</th>
            <th class="borde">NÚMERO DE IDENTIFICACIÓN</th>
            <th class="borde">FIRMA</th>
          </tr>
          @if($loads->isEmpty())
          @else
          @foreach ($loads as $load)
          <tr>
            <td class="borde" width="15%">{{ $load->Consecutivo }}</td>
            <td class="borde " width="45%">{{ $load->Nombre_completo_participante }}</td>
            <td class="borde" width="25%">{{ $load->Numero_documento }}</td>
            <td class="borde" width="15%"></td>
          </tr>
          @endforeach
          {{-- <tr class="text-center">
            <td class="borde"></td>
            <td class="borde"></td>
            <td class="borde"></td>
            <td class="borde"></td>
          </tr> --}}
          @endif
        </table>
      </div>

      <div class="col-md-12 mt-2 text-center">
        {{$Expedicion_report}}
      </div>

      {{-- <div class="col-md-12">
        <div class="col-md-12 mt-2 t3">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa praesentium, quibusdam excepturi sequi dolorem non omnis suscipit iste vero, beatae quae perferendis veniam soluta, ipsa amet sunt facilis nemo minima!
        </div>
        <div class="col-md-12 mt-2 t3">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa praesentium, quibusdam excepturi sequi dolorem non omnis suscipit iste vero, beatae quae perferendis veniam soluta, ipsa amet sunt facilis nemo minima!
        </div>
        <div class="col-md-12 mt-2 t3">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa praesentium, quibusdam excepturi sequi dolorem non omnis suscipit iste vero, beatae quae perferendis veniam soluta, ipsa amet sunt facilis nemo minima!
        </div>
        <div class="col-md-12 mt-2 t3">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa praesentium, quibusdam excepturi sequi dolorem non omnis suscipit iste vero, beatae quae perferendis veniam soluta, ipsa amet sunt facilis nemo minima!
        </div>
        <div class="col-md-12 mt-2 t3">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa praesentium, quibusdam excepturi sequi dolorem non omnis suscipit iste vero, beatae quae perferendis veniam soluta, ipsa amet sunt facilis nemo minima!
        </div>
        <div class="col-md-12 mt-2 t3">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa praesentium, quibusdam excepturi sequi dolorem non omnis suscipit iste vero, beatae quae perferendis veniam soluta, ipsa amet sunt facilis nemo minima!
        </div>
        <div class="col-md-12 mt-2 t3">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa praesentium, quibusdam excepturi sequi dolorem non omnis suscipit iste vero, beatae quae perferendis veniam soluta, ipsa amet sunt facilis nemo minima!
        </div>
        <div class="col-md-12 mt-2 t3">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa praesentium, quibusdam excepturi sequi dolorem non omnis suscipit iste vero, beatae quae perferendis veniam soluta, ipsa amet sunt facilis nemo minima!
        </div>
        <div class="col-md-12 mt-2 t3">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa praesentium, quibusdam excepturi sequi dolorem non omnis suscipit iste vero, beatae quae perferendis veniam soluta, ipsa amet sunt facilis nemo minima!
        </div>
        <div class="col-md-12 mt-2 t3">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa praesentium, quibusdam excepturi sequi dolorem non omnis suscipit iste vero, beatae quae perferendis veniam soluta, ipsa amet sunt facilis nemo minima!
        </div>
        <div class="col-md-12 mt-2 t3">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa praesentium, quibusdam excepturi sequi dolorem non omnis suscipit iste vero, beatae quae perferendis veniam soluta, ipsa amet sunt facilis nemo minima!
        </div>
      </div> --}}
    </div>
  </main>

  <footer>
    <div class="text-center mt-5 p-1 titulo">
      Liliana Villamizar Pérez <br>Coordinadora Nacional de Proyección Social
    </div>
  </footer>
</body>

</html>
