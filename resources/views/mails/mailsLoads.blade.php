<!DOCTYPE html>
<html lang="en">

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Cursos Certificados')." - ".env('APP_VERSION', '1.0') }}</title>
      <style>
        .contenedor{
          margin: 0% 0% 0% 0%;
          width: 100%;
          background: #F1F1F1;
        }
        .header {
          width: 100%;
          height: 250px;
          background: #8fda00;
          margin: auto;
          display: flex;
          border-bottom-left-radius: 30px;
          border-bottom-right-radius: 30px;
        }
        .img1 {
          width: 80%;
          height: 60%;
          margin:10% 10% 10% 10%;
          padding: 5%;
        }
        .header-left{
          width: 50%;
        }
        .header-right{
          width: 50%;
          padding: 5%;
          text-align: center;
        }
        .text-header {
          font-size: 40px;
          color: #ffffff;
          font-weight: bold;
          margin-top: 8%;
          margin-left: 1%;
        }
        .contenedor2 {
          background: #1e2936;
          width: 80%;
          /* height: 190px; */
          color: #ffffff;
          margin: auto;
          text-align: left;
          padding: 20px 20px 20px 20px;
        }
        .text {
          /* background: #8fda00; */
          font-size: 20px;
          margin: 10px 50px 10px 50px;
        }
        .contenedor-info {
          background: #F1F1F1;
          width: 80%;
          color: #1e2936;
          margin: auto;
          /* height: 190px; */
          text-align: left;
          padding: 20px 20px 20px 20px;
        }
        .contenedor-info2 {
          background: #1e2936;
          color: #ffffff;
          width: 80%;
          margin: auto;
          padding: 20px 20px 20px 20px;
          border-bottom-left-radius: 30px;
          border-bottom-right-radius: 30px;
        }
        footer{
          text-align: center;
          padding: 5px 5px 5px 5px;
        }
        .text-fin {
          font-weight: bold;
        }
        @media screen and (max-width:576px) {
          .contenedor {
            width: 100% !important;
          }
        }
        @media (min-width:577px) and (max-width:768px) {
          .contenedor {
            width: 100% !important;
          }
        }
        @media (min-width:769px) and (max-width:992px) {
          .contenedor {
            width: 100% !important;
          }
        }
        @media (min-width:993) and (max-width:1200px) {
          .contenedor {
            width: 80% !important;
          }
        }
        @media (min-width:1201px) {
          .contenedor {
            width: 80% !important;
          }
        }
      </style>
    </head>

    <body>
        <div class="contenedor">
            <div class="header">
                <div class="header-left">
                    <img class="img1" src="https://repo.cunapp.dev/cdn/logos/logocun402.png" alt="Logo 40">
                </div>
                <div class="header-right">
                    <h1 class="text-header">CUN <br>Proyección Social</h1>
                </div>
            </div>
            <div class="contenedor2">
              <div class="text">
                <p>
                  <strong>Estimad@ Participante</strong>,
                </p>
              </div>
            </div>
            <div class="contenedor-info">
                <div class="text">
                  <p>
                    Para acceder a tu certificado, haz clic en el siguiente enlace:
                    <a href="{{ env('APP_URL') }}consult">
                        <strong>Clic Aquí</strong>
                    </a>. Digita tu número de identificación y podrás descargarlo.
                  </p>
                  <p>
                    Éste ha sido generado de acuerdo con las asistencias reportadas y con los datos
                    proporcionados de tu parte.
                  </p>
                  <p>
                    Para confirmar la validez de tu certificado, escaneas el código QR con la cámara
                    del celular o la aplicación de Google Lens.
                  </p>
                </div>
            </div>
            <div class="contenedor-info2">
                <div class="text">
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
                </div>
            </div>
            <footer>
                <p class="text-fin">
                    <a href="index.html">
                        CUN - Proyección Social
                    </a>
                </p>
            </footer>
        </div>
    </body>

</html>
