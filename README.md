## Comandos para clonar plataforma de Cursos Certificados 

Para clonar el repositorio e instalarlo en produccion o pruebas se deben tener en cuenta los siguientes comandos:

- [Clonar el repositorio](#).
  ```bash
  https://github.com/MORJAN-CUN/CursosCertificados.git
- [Intalar dependencias del proyecto composer](#).
  ```bash
  composer install
- [Intalar dependencias del proyecto npm](#).
  ```bash
  npm install
- [crear archivo .env a partir del archivo de ejemplo](#).
  ```bash
  cp .env.example .env
- [Generar llave de aplicacion para que no de error](#).
  ```bash
  php artisan key:generate
- [Generar enlace simbolico de storage para poder manipular imagenes de usuario logueado](#).
  ```bash
  php artisan storage:link
- [Crear carpeta para las fuentes que maneja la plataforma](#).
  ruta: public/storage/fonts
  ```bash
  cd storage
  mkdir fonts
- [Cambiar ruta de acceso en archivo de certificados.css a produccion](#).
  ```bash
  background-image: url('http://localhost/ProyeccionSocial/public/images/certificados/fondo-certificado.png') !important;

  background-image: url('https://proyeccionsocial.cunapp.dev/images/certificados/fondo-certificado.png ') !important;  
- [Asignar credenciales de conexion a la DB, usuario y contraseña, en archivo .env ](#).
  ```bash
  APP_URL= https://proyeccionsocial.cunapp.dev/
  DB_DATABASE=Database name  
  DB_USERNAME=user database name  
  DB_PASSWORD=password database name
- [Asignar credenciales de envio de correo, en archivo .env ](#).
  ```bash
  MAIL_MAILER= ya las tiene en el ejemplo
  MAIL_HOST= ya las tiene en el ejemplo
  MAIL_PORT= ya las tiene en el ejemplo
  MAIL_USERNAME= ya las tiene en el ejemplo
  MAIL_PASSWORD= ya las tiene en el ejemplo
  MAIL_ENCRYPTION= ya las tiene en el ejemplo
  MAIL_FROM_ADDRESS= ya las tiene en el ejemplo
  MAIL_FROM_NAME= ya las tiene en el ejemplo

- [Ejecutar migraciones de la base de datos para que se ejecuten las tabla del proyecto ](#).
  ```bash
  php artisan migrate
- [opcional ejecutar este comando si se cuenta con datos de prueba iniciales en la base de datos](#).
  ```bash
  php artisan migrate --seed

## Propietarios de la plataforma ProyeccionSocial

Desde el área de Proyección social, realizan la solicitud de esta plataforma para la generación de los certificados para los diferentes cursos que realizan en esta área, siendo principal responsable la compañera Liliana Villamizar y su equipo.

## Documentación del proyecto

El proyecto será realizado y escrito con el framework laravel, esta es su documentación: [Laravel documentation](https://laravel.com/docs/).

## Licencia

La plataforma cuenta con la licencia de código abierto [MIT license](https://opensource.org/licenses/MIT).
