<?php

namespace App\Http\Controllers;

use App\Imports\LoadsImport;
use App\Mail\LoadMailable;
use App\Models\Load;
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


    // AQUI SE EXTRAE LA INFROMACION DE LA TABLA PARA TRAER LOS CAMPOS EMAIL,NOMBRE,CURSO,FECHAINICIAL,FECHAFINAL.
    $loads = DB::table('loads')->select('Email', 'Nombre_completo_participante', 'Nombre_producto', 'Tipo_producto', 'Fecha_inicial', 'Fecha_final')->distinct()->get();
    foreach ($loads as $load) {
      $mail = $load->Email;
      $nombre = $load->Nombre_completo_participante;
      $curso = $load->Nombre_producto;
      $tipo_curso = $load->Tipo_producto;

      // FORMATEAMOS FECHA INICIAL DE REALIZACION DEL CURSO
      $day_i = Carbon::parse($load->Fecha_inicial)->format('d');
      $dateMonthi = Carbon::parse($load->Fecha_inicial)->locale('es');
      $month_i = $dateMonthi->monthName;
      $year_i = Carbon::parse($load->Fecha_inicial)->format('Y');
      // FORMATEAMOS FECHA FINAL DE REALIZACION DEL CURSO
      $day_f = Carbon::parse($load->Fecha_final)->format('d');
      $dateMonthf = Carbon::parse($load->Fecha_final)->locale('es');
      $month_f = $dateMonthf->monthName;
      $year_f = Carbon::parse($load->Fecha_final)->format('Y');

      try {
        Mail::to($mail)->queue(
          new LoadMailable($nombre, $curso, $tipo_curso, $day_i, $month_i, $year_i, $day_f, $month_f, $year_f)
        );
      } catch (\Throwable $th) {
        // return $th->getMessage();
        return redirect()->route('loads.index', compact('loadscount', 'texto', 'loads'))->dangerBanner('Email no se envio, verificar!.' . $th->getMessage());
      }
    }
    return redirect()->route('loads.index', compact('loadscount', 'texto', 'loads'))->banner('Registro cargado exitosamente.');
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
