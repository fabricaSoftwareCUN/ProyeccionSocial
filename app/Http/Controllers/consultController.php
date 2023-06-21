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
    $studentCertificates = Load::where('numero_documento', $documento)->get();
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
    // CAPTURAMOS INFORMACION DE CERTIFICADO SOLICITADO
    $new = Load::findOrFail($id);
    // VALIDAMOS QUE EL CERTIFICADO SOLICITADO NO SE HAYA CREADO ANTERIORMENTE
    $cursoSolicitado = $new->nombre_producto;
    $documentoSolicitado = $new->numero_documento;
    $copy = Download::where([
      ['product_name', '=', $cursoSolicitado],
      ['document_number', '=', $documentoSolicitado],
    ])->get();
    $base = $_ENV['APP_URL'];

    if (count($copy) == 0) {
      //DEFINIMOS VARIABLES GENERALES PARA EL REPORE
      $entro = "nuevo";
      $document_type = $new->tipo_documento;
      $product_name = $new->nombre_producto;
      $duration = $new->duración;
      $modality = $new->modalidad;
      $city_expedition = $new->ciudad_expedición;
      $watermark = "Original";
      // FORMATEAMOS FECHA REALIZACION DEL CURSO NUEVO
      $day_r = Carbon::parse($new->fecha_realización)->format('d');
      $dateMonth = Carbon::parse($new->fecha_realización)->locale('es');
      $month_r = $dateMonth->monthName;
      $year_r = Carbon::parse($new->fecha_realización)->format('Y');
      // GENERAMOS PARAMETROS DE URL PARA EL QR CON LOS PARAMETROS DEL CERTIFICADO GENERADO
      $name = $new->nombre_estudiante;
      $document = $new->numero_documento;
      $date_realization = $new->fecha_realización;
      //CREAMOS CONSECUTIVO DEL CERTIFICADO NUEVO
      $consecutive = now()->format('Ym') . $id;
      // GENERAMOS LA FECHA DE EXPEDICION SI ES UN CERTIFICADO NUEVO
      $date = now()->locale('es');
      $day = now()->format('d');
      $month = $date->monthName;
      $year = now()->format('Y');
      // DEFINIMOS LA INSERCION A LA BASE DE DATOS EN LA TABALA DOWNLOADS
      $insertCertificate = new Download();
      $insertCertificate->student_name = $new->nombre_estudiante;
      $insertCertificate->participant_type = $new->tipo_participante;
      $insertCertificate->email = $new->email;
      $insertCertificate->document_type = $new->tipo_documento;
      $insertCertificate->document_number = $new->numero_documento;
      $insertCertificate->product_name = $new->nombre_producto;
      $insertCertificate->date_realized = $new->fecha_realización;
      $insertCertificate->duration = $new->duración;
      $insertCertificate->modality = $new->modalidad;
      $insertCertificate->city_expedition = $new->ciudad_expedición;
      $insertCertificate->consecutive = $consecutive;
      $insertCertificate->download_date = now()->format('Y-m-d');
      try {
        $insertCertificate->save();
      } catch (\Throwable $th) {
        return $th->getMessage();
      }
    } else {
      //DEFINIMOS VARIABLES GENERALES PARA EL REPORE
      $entro = "copia";
      foreach ($copy as $key) {
        $watermark = "Copia";
        $document_type = $key->document_type;
        $product_name = $key->product_name;
        $duration = $key->duration;
        $modality = $key->modality;
        $city_expedition = $key->city_expedition;
        // FORMATEAMOS FECHA REALIZACION DEL CURSO COPIA
        $day_r = Carbon::parse($key->date_realized)->format('d');
        $dateMonth = Carbon::parse($key->date_realized)->locale('es');
        $month_r = $dateMonth->monthName;
        $year_r = Carbon::parse($key->date_realized)->format('Y');
        // GENERAMOS PARAMETROS DE URL PARA EL QR CON LOS PARAMETROS DEL CERTIFICADO GENERADO
        $name = $key->student_name;
        $document = $key->document_number;
        $date_realization = $key->date_realized;
        //COPIAMOS CONSECUTIVO DEL CERTIFICADO NUEVO
        $consecutive = $key->consecutive;
        // GENERAMOS LA FECHA DE EXPEDICION SI ES UN CERTIFICADO NUEVO
        $day = Carbon::parse($key->download_date)->format('d');
        $date = Carbon::parse($key->download_date)->locale('es');
        $month = $date->monthName;
        $year = Carbon::parse($key->download_date)->format('Y');
      }
    }

    $url_validate = $base . "validateQr/" . $name . "/" . $document .  "/" . $date_realization . "/" . $consecutive;
    // DEFINMOS LAS CARACTERISTICAS DEL QR
    $qr = QrCode::size(110)->backgroundColor(255, 255, 255, 25)->color(31, 41, 54)
    ->margin(2)->generate($url_validate);
    // PASAMOS LOS DEMAS PARAMETROS PARA GENERAR EL CERTIFICADO
    $cons = now()->format('Ym');
    $pdf = PDF::loadView(
      'students.pdf',
      compact(
        'name',
        'document',
        'document_type',
        'product_name',
        'duration',
        'modality',
        'city_expedition',
        'new',
        'consecutive',
        'day',
        'month',
        'year',
        'qr',
        'day_r',
        'month_r',
        'year_r',
        'url_validate',
        'watermark'
      )
    );
    $pdf->setPaper('A4', 'landscape');
    return $pdf->download($name . "-" . $document . '.pdf');
    // return "entro=>" . $entro . "<br>dia realizacion=>" . $day_r . "<br>mes realizacion=>" . $month_r . "<br>año realizacion=>" . $year_r . "<br>nombre estudiante=>" . $name
    // . "<br>documento estudiante=>" . $document . "<br>fecha realizacion=>" . $date_realization . "<br>consecutivo=>" . $consecutive . "<br> url del qr=>" . $url_validate
    // . "<br>dia expedicion=>" . $day . "<br>mes expedicion=>" . $month . "<br>años expedicion=>" . $year . "<br>document_type=>" . $document_type;
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function validateQr(Request $request)
  {
    $documentParam = $request->document;
    $nameParam = $request->name;
    $realizationParam = $request->date_realization;
    $consParam = $request->consecutive;


    $certifiedValidate = Download::where('document_number', $documentParam)
      ->where('student_name', $nameParam)
      ->where('date_realized', $realizationParam)
    ->where('consecutive', $consParam)->get();
    return view('students.validateQr', compact('certifiedValidate'));
  }
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
