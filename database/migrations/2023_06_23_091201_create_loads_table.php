<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoadsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('loads', function (Blueprint $table) {
      $table->id();
      $table->string('Acta_cierre')->nullable();
      $table->string('Consecutivo')->unique();
      $table->string('Nombre_producto');
      $table->string('Nombre_completo_participante');
      $table->string('Tipo_documento');
      $table->string('Numero_documento');
      $table->string('Tipo_producto');
      $table->date('Fecha_inicial');
      $table->date('Fecha_final');
      $table->string('Duración');
      $table->string('Ciudad_expedición');
      $table->string('Firma_aliado')->nullable();
      $table->string('Logo_aliado')->nullable();
      $table->string('Sexo');
      $table->string('Telefono');
      $table->string('Email');
      $table->string('Empresa_entidad');
      $table->string('Ciudad_residencia');
      $table->string('Departamento_residencia');
      $table->string('Contenido_expuesto');
      $table->string('Presentacion_contenidos');
      $table->string('Mensaje_sugerencia');
      $table->string('Programa_academico');
      $table->string('Modalidad');
      $table->string('Sede');
      $table->string('Egresado');
      $table->string('Programa_egresado');
      $table->string('Docente');
      $table->string('Programa_docente');
      $table->string('Modalidad_docente');
      $table->string('Colaborador');
      $table->string('Cargo_colaborador');
      $table->string('Información_educativa');
      $table->string('Programa_interesado');
      $table->string('Asistencia');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('loads');
  }
}
