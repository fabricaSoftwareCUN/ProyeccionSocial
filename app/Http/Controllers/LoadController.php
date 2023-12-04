<?php

namespace App\Http\Controllers;

use App\Exports\LoadsExport;
use App\Imports\LoadsImport;
use App\Mail\LoadMailable;
use App\Models\Load;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\MinutesController;
use Illuminate\Support\Str;

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
    // $copies = $receivers->pluck('Email');
    // $receivers = DB::table('loads')->select('Email')->get();
    //GARANTISAMOS QE LOS CORREOS NO CONTENGAN ESPACIOS AL INICIO ENTRE Y EL FINAL DE LA CADENA
    $copies = $receivers->pluck('Email')->map(function ($email) {
      return str_replace(' ', '', trim(Str::lower($email)));
    });
    Log::info("correos escapados de espacios: =>".$copies."<=");
    try {
      Mail::bcc($copies)->send(new LoadMailable());
      // return redirect()->route('loads.index', compact('loadscount', 'texto', 'loads'))->banner('Registros cargados y correo enviado exitosamente.');
    } catch (\Throwable $th) {
      return redirect()->route('loads.index', compact('loadscount', 'texto', 'loads'))->dangerBanner('Email no se envio, verificar!.' . $th->getMessage());
    }
    $minuteController = new MinutesController();
    return $minuteController->printMinutes($code);

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
