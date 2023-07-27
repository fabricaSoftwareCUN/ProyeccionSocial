<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Load;
use Carbon\Carbon;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class consultController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('students.index');
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
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request)
  {
    $documento = $request->documento;
    $studentCertificates = Load::where('Numero_documento', $documento)->get();
    return view('students.show', compact('studentCertificates', 'documento'));
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function printPDF($id)
  {
    $base = $_ENV['APP_URL'];
    // CAPTURAMOS INFORMACION DE CERTIFICADO SOLICITADO
    $new = Load::findOrFail($id);
    // VALIDAMOS QUE EL CERTIFICADO SOLICITADO NO SE HAYA CREADO ANTERIORMENTE
    $cursoSolicitado = $new->Nombre_producto;
    $documentoSolicitado = $new->Numero_documento;
    $consecutivoSolicitado = str_pad($new->id, 5, "0", STR_PAD_LEFT);
    $copy = Download::where([['Nombre_producto', '=', $cursoSolicitado],
      ['Numero_documento', '=', $documentoSolicitado],
      ['Consecutivo', '=', $consecutivoSolicitado],
    ])->get();
    if (count($copy) == 0) {
      //DEFINIMOS VARIABLES GENERALES PARA EL REPORTE NUEVO
      $entro = "nuevo";
      $consecutivo = str_pad($new->id, 5, "0", STR_PAD_LEFT);
      $nombre_producto = $new->Nombre_producto;
      $name = $new->Nombre_completo_participante;
      $tipo_documento = $new->Tipo_documento;
      $numero_documento = $new->Numero_documento;
      $tipo_producto = $new->Tipo_producto;
      $fecha_inicial = $new->Fecha_inicial;
      $fecha_final = $new->Fecha_final;
      $duración = $new->Duración;
      $ciudad_expedición = $new->Ciudad_expedición;
      $firma = $new->Firma_aliado;
      $logo = $new->Logo_aliado;
      $fecha_expedicion = $new->created_at->format('Y-m-d');
      $watermark = "Original";

      if ($fecha_inicial == $fecha_final) {
        // FORMATEAMOS FECHA UNICA DEL CURSO NUEVO
        $day_i = Carbon::parse($fecha_inicial)->format('d');
        $dateMonth = Carbon::parse($fecha_inicial)->locale('es');
        $month_i = $dateMonth->monthName;
        $year_i = Carbon::parse($fecha_inicial)->format('Y');
        $fecha_realizado = "Realizada el " . $day_i . " de " . $month_i . " del " . $year_i;
      } else {
        // FORMATEAMOS FECHA INICIAL DEL CURSO NUEVO
        $day_i = Carbon::parse($fecha_inicial)->format('d');
        $dateMonth = Carbon::parse($fecha_inicial)->locale('es');
        $month_i = $dateMonth->monthName;
        $year_i = Carbon::parse($fecha_inicial)->format('Y');
        // FORMATEAMOS FECHA FINAL DEL CURSO NUEVO
        $day_f = Carbon::parse($fecha_final)->format('d');
        $dateMonth = Carbon::parse($fecha_final)->locale('es');
        $month_f = $dateMonth->monthName;
        $year_f = Carbon::parse($fecha_final)->format('Y');
        $fecha_realizado = "Realizada del " . $day_i . " de " . $month_i . " del " . $year_i .
        " al " . $day_f . " de " . $month_f . " del " . $year_f;
      }
      // GENERAMOS PARAMETROS DE URL PARA EL QR CON LOS PARAMETROS DEL CERTIFICADO GENERADO
      // $name = $nombre_completo_participante;
      $document = $numero_documento;
      $date_realization = $new->Consecutivo;
      // FORMATEO LA FECHA DE EXPEDICION
      // $date = now()->locale('es');
      $day = $new->created_at->format('d');
      $date = $new->created_at->locale('es');
      $month = $date->monthName;
      $year = $new->created_at->format('Y');
      $Expedicion = "Expedido en la ciudad de " . $ciudad_expedición . ", a los " . $day .
      " días del mes de " . $month . " del " . $year;

      // DEFINIMOS LA INSERCION A LA BASE DE DATOS EN LA TABALA DOWNLOADS
      $insertCertificate = new Download();
      $insertCertificate->Consecutivo = $consecutivo;
      $insertCertificate->Nombre_producto = $nombre_producto;
      $insertCertificate->Nombre_completo_participante = $name;
      $insertCertificate->Tipo_documento = $tipo_documento;
      $insertCertificate->Numero_documento = $numero_documento;
      $insertCertificate->Tipo_producto = $tipo_producto;
      $insertCertificate->Fecha_inicial = $fecha_inicial;
      $insertCertificate->Fecha_final = $fecha_final;
      $insertCertificate->Duración = $duración;
      $insertCertificate->Ciudad_expedición = $ciudad_expedición;
      $insertCertificate->Firma_aliado = $firma;
      $insertCertificate->Logo_aliado = $logo;
      $insertCertificate->Fecha_descarga = now()->format('Y-m-d');
      // EJECUTAMOS INSERTEN LA BASE DE DATOS
      try {
        $insertCertificate->save();
      } catch (\Throwable $th) {
        // CAPTURAMOS ERROR AL INSERTAR
        return $th->getMessage();
      }
    } else {
      //DEFINIMOS VARIABLES GENERALES PARA EL REPORTE COPIA
      foreach ($copy as $key) {
        $watermark = "Copia";
        $consecutivo = $key->Consecutivo;
        $nombre_producto = $key->Nombre_producto;
        $nombre_completo_participante = $key->Nombre_completo_participante;
        $tipo_documento = $key->Tipo_documento;
        $numero_documento = $key->Numero_documento;
        $tipo_producto = $key->Tipo_producto;
        $fecha_inicial = $key->Fecha_inicial;
        $fecha_final = $key->Fecha_final;
        $duración = $key->Duración;
        $ciudad_expedición = $key->Ciudad_expedición;
        $firma = $key->Firma_aliado;
        $logo = $key->Logo_aliado;
        $fecha_descarga = $key->Fecha_descarga;
        if ($key->Fecha_inicial == $key->Fecha_final) {
          // FORMATEAMOS FECHA UNICA DEL CURSO NUEVO
          $day_i = Carbon::parse($key->Fecha_inicial)->format('d');
          $dateMonth = Carbon::parse($key->Fecha_inicial)->locale('es');
          $month_i = $dateMonth->monthName;
          $year_i = Carbon::parse($key->Fecha_inicial)->format('Y');
          $fecha_realizado = "Realizada el " . $day_i . " de " . $month_i . " del " . $year_i;
        } else {
          // FORMATEAMOS FECHA INICIAL DEL CURSO NUEVO
          $day_i = Carbon::parse($key->Fecha_inicial)->format('d');
          $dateMonth = Carbon::parse($key->Fecha_inicial)->locale('es');
          $month_i = $dateMonth->monthName;
          $year_i = Carbon::parse($key->Fecha_inicial)->format('Y');
          // FORMATEAMOS FECHA FINAL DEL CURSO NUEVO
          $day_f = Carbon::parse($key->Fecha_final)->format('d');
          $dateMonth = Carbon::parse($key->Fecha_final)->locale('es');
          $month_f = $dateMonth->monthName;
          $year_f = Carbon::parse($key->Fecha_final)->format('Y');
          $fecha_realizado = "Realizada del " . $day_i . " de " . $month_i . " del " . $year_i .
            " al " . $day_f . " de " . $month_f . " del " . $year_f;
        }
        // GENERAMOS PARAMETROS DE URL PARA EL QR CON LOS PARAMETROS DEL CERTIFICADO GENERADO
        $name = $key->Nombre_completo_participante;
        $document = $key->Numero_documento;
        $date_realization = $key->Fecha_inicial;
        $consecutive = $key->Consecutivo;
        // FORMATEO LA FECHA DE EXPEDICION
        // $date = now()->locale('es');
        $day = $new->created_at->format('d');
        $date = $new->created_at->locale('es');
        $month = $date->monthName;
        $year = $new->created_at->format('Y');
        $Expedicion = "Expedido en la ciudad de " . $ciudad_expedición . ", a los " . $day .
        " días del mes de " . $month . " del " . $year;
      }
    }
    $pdf = PDF::loadView(
      'students.pdf',
      compact(
        'watermark',
        'consecutivo',
        'name',
        'nombre_producto',
        'numero_documento',
        'tipo_documento',
        'tipo_producto',
        'fecha_realizado',
        'duración',
        'ciudad_expedición',
        'firma',
        'logo',
        'Expedicion'
      )
    );
    $pdf->setPaper('A4', 'landscape');
    return $pdf->download($name . "-" . $document . '.pdf');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   *public function validateQr(Request $request)
   *{
   *  $documentParam = $request->document;
   *  $nameParam = $request->name;
   *  $realizationParam = $request->date_realization;
   *  $consParam = $request->consecutive;
   *
   *  $certifiedValidate = Download::where('document_number', $documentParam)
   *  ->where('student_name', $nameParam)
   *  ->where('date_realized', $realizationParam)
   *  ->where('consecutive', $consParam)->get();
   *  return view('students.validateQr', compact('certifiedValidate'));
   * }
   */
  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
