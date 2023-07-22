<?php

namespace App\Mail;

use App\Models\Load;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoadMailable extends Mailable
{
  use Queueable, SerializesModels;

  // public $nombre, $curso, $day_i, $month_i, $year_i, $day_f, $month_f, $year_f, $tipo_curso;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct()
  {

  }
  // public function __construct($nombre, $curso, $tipo_curso, $day_i, $month_i, $year_i, $day_f, $month_f, $year_f)
  // {
  //   $this->nombre = $nombre;
  //   $this->curso = $curso;
  //   $this->day_i = $day_i;
  //   $this->day_f = $day_f;
  //   $this->month_i = $month_i;
  //   $this->month_f = $month_f;
  //   $this->year_i = $year_i;
  //   $this->year_f = $year_f;
  //   $this->tipo_curso = $tipo_curso;
  // }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->subject("Tu certificado de asistencia está listo: ¡Accede ahora!")
    ->view('mails.pruebas');
    // ->view('mails.mailsLoads');
  }
}
