<?php

namespace App\Http\Controllers;

use App\Models\Load;
use App\Models\rc;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MinutesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $minutes = Load::distinct()->select('Acta_cierre', 'Nombre_producto', 'created_at')->orderByDesc('Acta_cierre')->get()->unique('Acta_cierre');
    $texto = trim($request->get('texto'));
    $filter = Load::where('Nombre_producto', 'LIKE', '%' . $texto . '%');

    return view('minutes.index', compact('minutes', 'texto'));
  }

  /**
   * Generates the preview of the closing act
   *
   * @return PDF
   */
  public function printMinutes($Acta_cierre)
  {
    $loads = DB::table('loads')
      ->select('id', 'Nombre_completo_participante', 'Numero_documento')
      ->where('Acta_cierre', $Acta_cierre)
      ->get();

    $reports = DB::table('loads')
      ->select('Acta_cierre', 'Tipo_producto', 'Nombre_producto', 'Fecha_inicial', 'Fecha_final', 'Ciudad_expedición', 'Duración', 'created_at')
      ->where('Acta_cierre', $Acta_cierre)
      ->first();

    $Acta_cierre_report = $reports->Acta_cierre;
    $Tipo_producto_report = $reports->Tipo_producto;
    $Nombre_producto_report = $reports->Nombre_producto;

    if ($reports->Fecha_inicial == $reports->Fecha_final) {
      // FORMATEAMOS FECHA UNICA DEL CURSO NUEVO
      $day_i = Carbon::parse($reports->Fecha_inicial)->format('d');
      $dateMonth = Carbon::parse($reports->Fecha_inicial)->locale('es');
      $month_i = $dateMonth->monthName;
      $year_i = Carbon::parse($reports->Fecha_inicial)->format('Y');
      $fecha_realizado = "realizada el " . $day_i . " de " . $month_i . " del " . $year_i;
    } else {
      // FORMATEAMOS FECHA INICIAL DEL CURSO NUEVO
      $day_i = Carbon::parse($reports->Fecha_inicial)->format('d');
      $dateMonth = Carbon::parse($reports->Fecha_inicial)->locale('es');
      $month_i = $dateMonth->monthName;
      $year_i = Carbon::parse($reports->Fecha_inicial)->format('Y');
      // FORMATEAMOS FECHA FINAL DEL CURSO NUEVO
      $day_f = Carbon::parse($reports->Fecha_final)->format('d');
      $dateMonth = Carbon::parse($reports->Fecha_final)->locale('es');
      $month_f = $dateMonth->monthName;
      $year_f = Carbon::parse($reports->Fecha_final)->format('Y');
      $fecha_realizado = "realizada del " . $day_i . " de " . $month_i . " del " . $year_i .
        " al " . $day_f . " de " . $month_f . " del " . $year_f;
    }

    $Ciudad_expedicion_report = $reports->Ciudad_expedición;
    $Duracion_report = $reports->Duración;

    // FORMATEAMOS FECHA EXPEDCION DEL ACTA DE CIERRE
    $day_r = Carbon::parse($reports->created_at)->format('d');
    $dateMonth = Carbon::parse($reports->created_at)->locale('es');
    $month_r = $dateMonth->monthName;
    $year_r = Carbon::parse($reports->created_at)->format('Y');
    $Expedicion_report = "Dada en la ciudad de " . $Ciudad_expedicion_report .
      ", a los " . $day_r . " días del mes de " . $month_r . " del " . $year_r;

    $pdf = PDF::loadView('loads.pdf', compact(
      'loads',
      'Acta_cierre_report',
      'Tipo_producto_report',
      'Nombre_producto_report',
      'fecha_realizado',
      'Ciudad_expedicion_report',
      'Duracion_report',
      'Expedicion_report'
    ));
    $pdf->setPaper('A4');
    return $pdf->stream("Acta de cierre - " . $reports->Acta_cierre . '.pdf');
  }

  /**
   * Generates the preview of the closing act
   *
   * @return PDF
   */
  public function deleteMinutes($Acta_cierre)
  {
    try {
      $deleted = DB::table('loads')->where('Acta_cierre', '=', $Acta_cierre)->delete();
      $minutes = Load::distinct()->select('Acta_cierre', 'Nombre_producto', 'created_at')->orderByDesc('Acta_cierre')->get()->unique('Acta_cierre');
    } catch (\Throwable $th) {
      return view('minutes.index', compact('minutes'));
      // return redirect()->route('minutes.index')->dangerBanner('No pude eliminar el acta de cierre, revisar por que: ' . $th->getMessage());
    }
    return view('minutes.index', compact('minutes'));
    // return redirect()->route('minutes.index')->banner('Acta eliminada exitosamente!.');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\rc  $rc
   * @return \Illuminate\Http\Response
   */
  public function show()
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\rc  $rc
   * @return \Illuminate\Http\Response
   */
  public function edit()
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\rc  $rc
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\rc  $rc
   * @return \Illuminate\Http\Response
   */
  public function destroy()
  {
    //
  }
}
