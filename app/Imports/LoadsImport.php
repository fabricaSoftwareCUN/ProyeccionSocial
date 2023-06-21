<?php

namespace App\Imports;

use App\Models\Load;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LoadsImport implements ToModel, WithHeadingRow
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new Load([
      'nombre_estudiante' => $row['nombre'],
      'tipo_participante' => $row['participacion'],
      'email' => $row['correo'],
      'tipo_documento' => $row['tipo_documento'],
      'numero_documento' => $row['numero_documento'],
      'nombre_producto' => $row['producto'],
      'fecha_realización' => $row['fecha_realizacion'],
      'duración' => $row['duracion'],
      'modalidad' => $row['modalidad'],
      'ciudad_expedición' => $row['ciudad_expedicion'],
    ]);
  }
}
