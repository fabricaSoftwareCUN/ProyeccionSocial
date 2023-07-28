<?php

namespace App\Http\Controllers;

use App\Exports\LoadsExport;
use App\Imports\LoadsImport;
use App\Mail\LoadMailable;
use App\Models\ClosingAct;
use App\Models\Load;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Facades\Log;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class LoadController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $loadscount = Load::all();
    $texto = trim($request->get('texto'));
    $loads = Load::where('Nombre_producto', 'LIKE', '%' . $texto . '%')
      ->orWhere('id', 'LIKE', '%' . $texto . '%')
      ->orWhere('Numero_documento', 'LIKE', '%' . $texto . '%')
      ->orWhere('Nombre_completo_participante', 'LIKE', '%' . $texto . '%')
      ->orderByDesc('id')
      ->paginate(15);
    return view('loads.index', compact('loadscount', 'texto', 'loads'));
  }

  /**
   * Display a list of the resource to view Closing Minutes.
   *
   * @return \Illuminate\Http\Response
   */
  public function minutes(Request $request)
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
      $fecha_realizado = "Realizada el " . $day_i . " de " . $month_i . " del " . $year_i;
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
      $fecha_realizado = "Realizada del " . $day_i . " de " . $month_i . " del " . $year_i .
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
  public function load(Request $request)
  {
    // VALIDACIO DEL CAMPO QUE TRAE EL ARCHIVO DESDE EL FORMULARIO
    $request->validate([
      'file' => 'required'
    ]);
    $texto = trim($request->get('texto'));
    $loadscount = Load::all();
    $loads = Load::where('Nombre_producto', 'LIKE', '%' . $texto . '%')
    ->orWhere('id', 'LIKE', '%' . $texto . '%')
    ->orderByDesc('id')
    ->paginate(15);

    try {
      Excel::import(new LoadsImport, request()->file('file'));
    } catch (\Throwable $th) {
      return redirect()->route('loads.index', compact('loadscount', 'texto', 'loads'))->dangerBanner('Archivo no cargado, revisar por que: ' . $th->getMessage());
    }
    $loadAct = DB::table('loads')->select('Acta_cierre')->distinct()->orderByDesc('Acta_cierre')->first();

    if ($loadAct->Acta_cierre == null) {
      $code = "00001";
    } else {
      $cont = $loadAct->Acta_cierre + 1;
      $code = $cont;
    }
    $Code = str_pad($code, 5, "0", STR_PAD_LEFT);

    $affected = DB::table('loads')->where('Acta_cierre', null)->update(['Acta_cierre' => $Code]);
    Log::error($affected . " registros actualizados en tabla loads");

    // AQUI SE EXTRAE LA INFROMACION DE LA TABLA PARA TRAER LOS CAMPOS EMAIL,NOMBRE,CURSO,FECHAINICIAL,FECHAFINAL.
    $receivers = DB::table('loads')->select('Email')->where('Acta_cierre', $Code)->get();
    $copies = $receivers->pluck('Email');
    try {
      // Mail::bcc($copies)->send(new LoadMailable());
      // return redirect()->route('loads.index', compact('loadscount', 'texto', 'loads'))->banner('Registros cargados y correo enviado exitosamente.');
    } catch (\Throwable $th) {
      return redirect()->route('loads.index', compact('loadscount', 'texto', 'loads'))->dangerBanner('Email no se envio, verificar!.' . $th->getMessage());
    }
    return $this->printMinutes($code);

    // return redirect()->route('loads.index', compact('loadscount', 'texto', 'loads'))->banner('Acta generada exitosamente!.');
  }

  /**
   * Download list of all records in loads table.
   *
   * @return \Illuminate\Http\Response
   */
  public function export()
  {
    return Excel::download(new LoadsExport, 'registros_cargados.xlsx');
    return view('loads.index');
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
   * @param  \App\Models\Load  $load
   * @return \Illuminate\Http\Response
   */
  public function show(Load $load)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Load  $load
   * @return \Illuminate\Http\Response
   */
  public function edit(Load $load)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Load  $load
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Load $load)
  {
    try {
      $load->update($request->all());
    } catch (\Throwable $th) {
      return redirect()->route('loads.index')->dangerBanner('Registro no modificado, revisar por que: ' . $th);
    }
    return redirect()->route('loads.index')->banner('Registro actualizado exitosamente.');

    // return $request;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Load  $load
   * @return \Illuminate\Http\Response
   */
  public function destroy(Load $load)
  {
    try {
      $load->delete();
    } catch (\Throwable $th) {
      return redirect()->route('loads.index')->dangerBanner('Registro no eliminado, revisar por que: ' . $th->getMessage());
    }
    return redirect()->route('loads.index')->banner('Registro eliminado exitosamente.');
  }
}
