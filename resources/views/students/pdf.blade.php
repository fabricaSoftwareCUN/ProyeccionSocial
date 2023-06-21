<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificado de {{ Str::title($product_name) }}</title>
    <link href="{{ env('APP_URL') }}css/certificados.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    {{-- FONTS GOOGLE --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,500&display=swap" rel="stylesheet">
    <style>
        body {
          font-family: 'Montserrat', sans-serif;
          font-size: 22px;
        }
        .nombre{
          font-family: 'Montserrat', sans-serif;
          font-style: italic;
          font-size: 36px;
        }
        .titulo{
          font-style: bold;
          font-size: 23px;
        }
    </style>
  </head>

<body>
    <header class="text-center">
      <div class="div-img">
        <img src="{{ env('APP_URL') }}images/logo-cun-certificado.png" alt="cun-logo" width="300">
      </div>
    </header>

    <main>
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-12 mt-2 titulo">
            <b>
              La Corporación Unificada Nacional de Educación Superior – CUN
            </b>
          </div>
          <div class="col-md-12 mt-4 t2">
            Reconoce a:
          </div>
          <div class="col-md-12 mt-2 nombre">
            <b>{{ Str::title($name) }}</b>
          </div>
          <div class="col-md-12 mt-4 t2">
            Identificado(a) con {{ $document_type . '. No. ' . $document }}
          </div>
          <div class="col-md-12 mt-2 t2">
            Por su participación en el “<b>{{ $product_name }}</b>”, con una<br>
            intensidad de {{ $duration }} horas; realizada el {{ $day_r }} de {{ $month_r }} del
            {{ $year_r }}, por modalidad {{ $modality }}.
          </div>

          <div class="col-md-12 mt-2 t3">
            Expedido en la ciudad de {{ $city_expedition }}, a los {{ $day }} días del mes de
            {{ $month }}
            del año {{ $year }}.
          </div>
          <div class="container mt-2">
            <div class="card">
              <div class="card-body">
                <a href="{{ $url_validate }}" target="_blank"><img src="data:image/svg+xml;base64, {!! base64_encode($qr) !!}" /></a>
              </div>
              <div class="card-footer">
                <h5>{{ $watermark }}</h5>
              </div>
            </div>
          </div>
            {{-- <div class="col-md-8">
              <div class="firma-left mt-2" ></div>Firma
              <div class="firma-right mt-2"></div>Firma
            </div> --}}
        </div>
      </div>
    </main>

    <footer>
      <div class="text-center p-3 titulo">
        <h2>{{ $consecutive }}</h2>
      </div>
    </footer>
</body>

</html>
