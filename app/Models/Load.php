<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Load extends Model
{
  use HasFactory;

  protected $fillable = [
    'Consecutivo',
    'Subitulo',
    'Nombre_producto',
    'Nombre_completo_participante',
    'Tipo_documento',
    'Numero_documento',
    'Tipo_producto',
    'Fecha_inicial',
    'Fecha_final',
    'Duración',
    'Ciudad_expedición',
    'Firma_aliado',
    'Logo_aliado',
    'Sexo',
    'Telefono',
    'Email',
    'Empresa_entidad',
    'Ciudad_residencia',
    'Departamento_residencia',
    'Contenido_expuesto',
    'Presentacion_contenidos',
    'Mensaje_sugerencia',
    'Programa_academico',
    'Modalidad',
    'Sede',
    'Egresado',
    'Programa_egresado',
    'Docente',
    'Programa_docente',
    'Modalidad_docente',
    'Colaborador',
    'Cargo_colaborador',
    'Información_educativa',
    'Programa_interesado',
    'Asistencia',
  ];
}
