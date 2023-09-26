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
      $table->string('Nombre_producto');
      $table->string('Tipo_producto');
      $table->date('Fecha_inicial');
      $table->date('Fecha_final');
      $table->string('Duración');
      $table->string('Ciudad_expedición');
      $table->string('Logo_aliado')->nullable();
      $table->string('Firma_aliado')->nullable();
      $table->string('Nombre_completo_participante');
      $table->string('Tipo_documento');
      $table->string('Numero_documento');
      $table->string('Sexo');
      $table->string('Telefono');
      $table->string('Email');
      $table->string('Empresa_entidad');
      $table->string('Ciudad_residencia');
      $table->string('Departamento_residencia');
      $table->string('Contenido_expuesto')->nullable();
      $table->string('Presentacion_contenidos')->nullable();
      $table->string('Mensaje_sugerencia')->nullable();
      $table->string('Estudiante_cunista');
      $table->string('Programa_academico')->nullable();
      $table->string('Modalidad')->nullable();
      $table->string('Sede')->nullable();
      $table->string('Egresado');
      $table->string('Programa_egresado')->nullable();
      $table->string('Docente');
      $table->string('Programa_docente')->nullable();
      $table->string('Modalidad_docente')->nullable();
      $table->string('Colaborador');
      $table->string('Cargo_colaborador')->nullable();
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
