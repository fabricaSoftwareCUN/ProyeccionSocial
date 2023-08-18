<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDownloadsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('downloads', function (Blueprint $table) {
      $table->id();
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
      $table->date('Fecha_descarga');
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
    Schema::dropIfExists('downloads');
  }
}
