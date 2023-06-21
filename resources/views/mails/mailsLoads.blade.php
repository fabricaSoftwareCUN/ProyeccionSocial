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
                <div class="jumbotron">
                    <p>Hola!</p>
                    <p>Estimado/a <strong>{{ $nombre }}</strong>,</p>
                </div>
                <ul>
                    <p>
                        Esperamos que te encuentres bien. En nombre de Desarrollo Profesional y Egresados de la CUN,
                        queremos agradecerte
                        por tu participación en nuestra reciente actividad <strong>{{ $curso }}</strong>
                        realizada el {{ $day_r }} de
                        {{ $month_r }} del {{ $year_r }},. Nos complace informarte que tu certificado de
                        asistencia ya está disponible.
                    </p>
                    <p>
                        Valoramos tu compromiso y dedicación en tu desarrollo profesional, y estamos aquí para brindarte
                        apoyo en cada etapa de tu trayectoria.
                        Reconocemos tus esfuerzos y queremos ayudarte a destacar tus logros.
                    </p>
                    <p>
                        Para acceder a tu certificado de asistencia, simplemente haz clic en el siguiente enlace:
                        <a href="{{ env('APP_URL') }}consult">
                            Dale Clik Aqui
                        </a>
                        Te recomendamos descargar y guardar una copia electrónica de tu certificado para futuras
                        referencias.
                    </p>
                    <p>
                        Si tienes alguna pregunta o necesitas asistencia adicional, no dudes en contactarnos. Estamos
                        aquí para ayudarte en tu camino hacia
                        el éxito profesional.
                    </p>
                    <!-- Otros campos -->

                </ul>
                <!-- <p>Dirigite a este enlace</p> -->
                <ul>
                    <li>
                        <p>
                            ¡Gracias por formar parte de la comunidad de Desarrollo Profesional y Egresados de la CUN!
                        </p>
                        <p>
                            Cordialmente,
                            este es el cuerpo del correo que debe llegarle al estudiante
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</body>

</html>
