<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $loadscount = Download::all();
    $texto = trim($request->get('texto'));
    $loads = Download::where('Nombre_completo_participante', 'LIKE', '%' . $texto . '%')
    ->orWhere('Numero_documento', 'LIKE', '%' . $texto . '%')
    ->orWhere('Nombre_producto', 'LIKE', '%' . $texto . '%')
    ->orderByDesc('id')
    ->paginate(15);
    return view('downloads.index', compact('loadscount', 'texto', 'loads'));
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
   * @param  \App\Models\Download  $download
   * @return \Illuminate\Http\Response
   */
  public function show(Download $download)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Download  $download
   * @return \Illuminate\Http\Response
   */
  public function edit(Download $download)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Download  $download
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Download $download)
  {
    // return $request;
    try {
      $download->update($request->all());
    } catch (\Throwable $th) {
      return redirect()->route('downloads.index')->dangerBanner('Registro no modificado, revisar por que: ' . $th);
    }
    return redirect()->route('downloads.index')->banner('Registro actualizado exitosamente.');
    return "update";
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Download  $download
   * @return \Illuminate\Http\Response
   */
  public function destroy(Download $download)
  {
    //
  }
}
