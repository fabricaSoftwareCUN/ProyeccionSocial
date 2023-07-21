<?php

namespace App\Http\Controllers;

use App\Imports\LoadsImport;
use App\Mail\LoadMailable;
use App\Models\ClosingAct;
use App\Models\Load;
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
      ->orWhere('Consecutivo', 'LIKE', '%' . $texto . '%')
      ->orWhere('Numero_documento', 'LIKE', '%' . $texto . '%')
      ->orWhere('Nombre_completo_participante', 'LIKE', '%' . $texto . '%')
      ->orderByDesc('id')
      ->paginate(15);
    return view('loads.index', compact('loadscount', 'texto', 'loads'));
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
      ->orWhere('Consecutivo', 'LIKE', '%' . $texto . '%')
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

    if ($affected == 0) {
      Log::error($affected . " registros actualizados en tabla loads");
      // return redirect()->route('loads.index', compact('loadscount', 'texto', 'loads'))->dangerBanner('No pude cargar ningun registro nuevo, favor verificar.');
    } else {
      Log::info($affected . " registros actualizados en tabla loads");
      // return redirect()->route('loads.index', compact('loadscount', 'texto', 'loads'))->banner('Registros cargados exitosamente.');
    }

    //se deja comentado el envio de correo por que hay que ver el tema de queue:workers en el servidor

    // AQUI SE EXTRAE LA INFROMACION DE LA TABLA PARA TRAER LOS CAMPOS EMAIL,NOMBRE,CURSO,FECHAINICIAL,FECHAFINAL.

    $mailCopy = DB::table('loads')->select('Email')->where('Acta_cierre', $Code)->get();

    $copies = [];
    // for ($i = 1; $i <= count($mailCopy); $i++) {
    //   $copies = $mailCopy[$i];
    // }
    return count($mailCopy);
    // foreach ($loads as $load) {
    //   $mail = $load->Email;
    //   $nombre = $load->Nombre_completo_participante;
    //   $curso = $load->Nombre_producto;
    //   $tipo_curso = $load->Tipo_producto;

    //   // FORMATEAMOS FECHA INICIAL DE REALIZACION DEL CURSO
    //   $day_i = Carbon::parse($load->Fecha_inicial)->format('d');
    //   $dateMonthi = Carbon::parse($load->Fecha_inicial)->locale('es');
    //   $month_i = $dateMonthi->monthName;
    //   $year_i = Carbon::parse($load->Fecha_inicial)->format('Y');
    //   // FORMATEAMOS FECHA FINAL DE REALIZACION DEL CURSO
    //   $day_f = Carbon::parse($load->Fecha_final)->format('d');
    //   $dateMonthf = Carbon::parse($load->Fecha_final)->locale('es');
    //   $month_f = $dateMonthf->monthName;
    //   $year_f = Carbon::parse($load->Fecha_final)->format('Y');
      try {
      Mail::to("janluy_moreno@cun.edu.co")->bcc($copies[])->queue(new LoadMailable());
      } catch (\Throwable $th) {
      return $th;
        // return redirect()->route('loads.index', compact('loadscount', 'texto', 'loads'))->dangerBanner('Email no se envio, verificar!.' . $th->getMessage());
      }
    // }
    return redirect()->route('loads.index', compact('loadscount', 'texto', 'loads'))->banner('Registros cargados y correo enviado exitosamente.');
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
