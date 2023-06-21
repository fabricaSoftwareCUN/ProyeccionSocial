<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <title>{{ config('app.name', 'Cursos Certificados')." - ".env('APP_VERSION', '1.0') }}</title>
  <!-- favicon -->
  <link rel="shortcut icon" href="{{ asset('images/icono-cun.png') }}" type="image/x-icon">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
  <!-- icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <!-- Styles -->
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
  <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/inputs.css') }}">
  <link rel="stylesheet" href="{{ asset('css/carga.css') }}">
</head>

<body class="antialiased" onbeforeunload="return ocultar()">
  <main>
    {{ $slot }}
  </main>
  <script>
    window.onload = function() {
      var container_load = document.getElementById('container_load');
      container_load.style.visibility = 'hidden';
      container_load.style.opacity = '0';
    }

    function mostrar() {
      var container_load = document.getElementById('container_load');
      container_load.style.visibility = 'visible';
      container_load.style.opacity = '1';
    }
  </script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
