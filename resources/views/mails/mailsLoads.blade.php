<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Emails Cursos</title>
    <style>
        body {
            background-color: #fff;
        }

        header {
            background: #8fda00;
            max-height: 250px;
            margin-top: 0;
        }

        footer {
            color: #1f2936;
            background-color: #FFF;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 40px;
        }

        .img-logo {
            display: block;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
            padding-top: 20px;
        }

        .img {
            display: block;
            width: 300px;
            margin-left: 0px;
            margin-right: auto;
            margin-top: 0px;
            transform: scaleX(-1);
        }

        .texto-header {
            text-align: center;
            color: white;
            font-size: 3.5rem;
            width: 250%;
            margin-top: 10%;
        }

        .contentGen {
            color: #F1F1F1;
            position: absolute;
            background-color: #1f2936;
            max-width: 1000px;
            max-height: 100%;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .contentInfo {
            color: #1f2936;
            background-color: #F1F1F1;
        }

        .mx-auto {
            position: absolute;
            top: 250px;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
        }

        .py-4 {
            padding-top: 1rem
                /* 16px */
            ;
            padding-bottom: 1rem
                /* 16px */
        }

        .pt-5 {
            padding-top: 1.25rem
                /* 20px */
            ;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .wrapper {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 0px;
        }

        .container {
            width: 100%;
        }

        @media (min-width: 640px) {
            .container {
                max-width: 640px;
            }
        }

        @media (min-width: 768px) {
            .container {
                max-width: 768px;
            }
        }

        @media (min-width: 1024px) {
            .container {
                max-width: 1024px;
            }
        }

        @media (min-width: 1280px) {
            .container {
                max-width: 1280px;
            }
        }

        @media (min-width: 1536px) {
            .container {
                max-width: 1536px;
            }
        }

        .row {
            grid-row: auto
        }

        .col-md-1 {
            position: relative;
            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px
        }

        @media (min-width:768px) {
            .col-md-1 {
                -ms-flex: 0 0 8.333333%;
                flex: 0 0 8.333333%;
                max-width: 8.333333%
            }
        }

        .col-md-2 {
            position: relative;
            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px
        }

        @media (min-width:768px) {
            .col-md-2 {
                -ms-flex: 0 0 16.666667%;
                flex: 0 0 16.666667%;
                max-width: 16.666667%
            }
        }

        .col-md-5 {
            position: relative;
            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px
        }

        @media (min-width:768px) {
            .col-md-5 {
                -ms-flex: 0 0 41.666667%;
                flex: 0 0 41.666667%;
                max-width: 41.666667%
            }
        }

        .col-md-8 {
            position: relative;
            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px
        }

        @media (min-width:768px) {
            .col-md-8 {
                -ms-flex: 0 0 66.666667%;
                flex: 0 0 66.666667%;
                max-width: 66.666667%
            }
        }

        .col-md-12 {
            position: relative;
            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px
        }

        @media (min-width:768px) {
            .col-md-12 {
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%
            }
        }
    </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p>
          Buen día,
        </p>
        <p>
          Estimad@ <strong>Participante</strong>,
        </p>
        <ul>
          <p>
            Desde la Coordinación Nacional de Proyección Social - CUN,
            nos complace informarte que tu certificado ya está disponible.
          </p>
          <p>
            Este certificado ha sido generado de acuerdo con las asistencias
            reportadas y con los datos proporcionados de tu parte en el formulario
            correspondiente.
          </p>
          <p>
            ¡Felicitaciones por este logro en tu formación académica!.
          </p>
          <p>
            Para acceder a tu certificado de asistencia, simplemente haz clic en el siguiente
            enlace:
            <a href="{{ env('APP_URL') }}consult">
                <strong>Dale Clik Aqui</strong>
            </a>.
            Digita tu número de identificación y accede a descargar tu certificación.
          </p>
          <p>
            Si tienes alguna pregunta, no dudes en contactarnos al correo
            <strong>proyeccion_social@cun.edu.co</strong>
          </p>
          <p>
            ¡Siempre serás bienvenid@ a nuestras capacitaciones!
            <a href="https://cun.edu.co/somos-la-cun/proyeccion-social">
              <strong>Encuentra nuestra oferta vigente aquí</strong>
            </a>.
          </p>
          <p>
            Cordialmente,
          </p>
          <p>
            Coordinación Nacional de Proyección Social - CUN.
          </p>
          </ul>
      </div>
    </div>
  </div>
</body>

</html>
