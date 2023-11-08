<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Load extends Model
{
  use HasFactory;

  protected $fillable = [
    'Nombre_producto',
    'Tipo_producto',
    'Fecha_inicial',
    'Fecha_final',
    'Duración',
    'Ciudad_expedición',
    'Firma_aliado',
    'Logo_aliado',
    'Nombre_completo_participante',
    'Tipo_documento',
    'Numero_documento',
    'Sexo',
    'Telefono',
    'Email',
    'Empresa_entidad',
    'Ciudad_residencia',
    'Departamento_residencia',
    'Contenido_expuesto',
    'Presentacion_contenidos',
    'Mensaje_sugerencia',
    'Estudiante_cunista',
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
    'Asistencia',
  ];
}
