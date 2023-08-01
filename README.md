```bash
cd \
copy a b
ping 192.168.0.1
```

## Comandos para clonar plataforma de Cursos Certificados 

Para clonar el repositorio e instalarlo en produccion o pruebas se deben tener en cuenta los siguientes comandos:

- [Clonar el repositorio](#).
  ```bash
  https://github.com/MORJAN-CUN/CursosCertificados.git
  ```
- [Intalar dependencias del proyecto composer](#).
- **[composer install](#)**
- [Intalar dependencias del proyecto npm](#).
- **[npm install](#)**
- [crear archivo .env a partir del archivo de ejemplo](#).
- **[cp .env.example .env](#)**
- [Generar llave de aplicacion para que no de error](#).
- **[php artisan key:generate](#)**
- [Generar enlace simbolico de storage para poder manipular imagenes de usuario logueado](#).
- **[php artisan storage:link](#)**
- [Crear carpeta para las fuentes que maneja la plataforma](#).
- **[public/storage/fonts](#)**
- [Cambiar ruta de acceso en archivo de certificados.css a produccion](#).
- **[Quitar la regla cel css body, html {}](#)**
- **[background-image: url('http://localhost/ProyeccionSocial/public/images/certificados/fondo-certificado.png') !important;](#)**
- **[Poner la regla cel css body, html {}](#)**
- **[https://proyeccionsocial.cunapp.dev/images/certificados/fondo-certificado.png](#)**
- [Asignar credenciales de conexion a la DB, usuario y contraseña, en archivo .env ](#).
- **[DB_DATABASE=Database name](#)**
- **[DB_USERNAME=user database name](#)**
- **[DB_PASSWORD=password database name](#)**
- [Ejecutar migraciones de la base de datos para que se ejecuten las tabla del proyecto ](#).
- **[php artisan migrate](#)**
- [opcional ejecutar este comando si se cuenta con datos de prueba iniciales en la base de datos](#).
- **[php artisan migrate --seed](#)**

## Propietarios de la plataforma

Desde el área de Proyección social, realizan la solicitud de esta plataforma para la generación de los certificados para los diferentes cursos que realizan en esta área, siendo principal responsable la compañera Liliana Villamizar y su equipo.

## Documentación del proyecto

El proyecto será realizado y escrito con el framework laravel, esta es su documentación: [Laravel documentation](https://laravel.com/docs/).

## Licencia

La plataforma cuenta con la licencia de código abierto [MIT license](https://opensource.org/licenses/MIT).
