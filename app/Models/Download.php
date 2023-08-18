<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
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
    'Fecha_descarga',
  ];
}
