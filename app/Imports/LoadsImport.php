<?php

namespace App\Imports;

use App\Models\Load;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Maatwebsite\Excel\Imports\HeadingRowFormatter;

// HeadingRowFormatter::default('none');
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
      'Nombre_producto' => $row['nombre_producto'],
      'Nombre_completo_participante' => $row['nombre_completo_participante'],
      'Tipo_documento' => $row['tipo_documento'],
      'Numero_documento' => $row['numero_documento'],
      'Tipo_producto' => $row['tipo_producto'],
      'Fecha_inicial' => $row['fecha_inicial'],
      'Fecha_final' => $row['fecha_final'],
      'Duración' => $row['duracion'],
      'Ciudad_expedición' => $row['ciudad_expedicion'],
      'Firma_aliado' => $row['firma_aliado'],
      'Logo_aliado' => $row['logo_aliado'],
      'Sexo' => $row['sexo'],
      'Telefono' => $row['telefono'],
      'Email' => $row['email'],
      'Empresa_entidad' => $row['empresa_entidad'],
      'Ciudad_residencia' => $row['ciudad_residencia'],
      'Departamento_residencia' => $row['departamento_residencia'],
      'Contenido_expuesto' => $row['contenido_expuesto'],
      'Presentacion_contenidos' => $row['presentacion_contenidos'],
      'Mensaje_sugerencia' => $row['mensaje_sugerencia'],
      'Programa_academico' => $row['programa_academico'],
      'Modalidad' => $row['modalidad'],
      'Sede' => $row['sede'],
      'Egresado' => $row['egresado'],
      'Programa_egresado' => $row['programa_egresado'],
      'Docente' => $row['docente'],
      'Programa_docente' => $row['programa_docente'],
      'Modalidad_docente' => $row['modalidad_docente'],
      'Colaborador' => $row['colaborador'],
      'Cargo_colaborador' => $row['cargo_colaborador'],
      'Información_educativa' => $row['informacion_educativa'],
      'Programa_interesado' => $row['programa_interesado'],
      'Asistencia' => $row['asistencia'],
    ]);
  }
}
