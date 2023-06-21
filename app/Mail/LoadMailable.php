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

    public $nombre;
    public $curso;
    public $day_r,$month_r,$year_r;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre,$curso,$day_r,$month_r,$year_r)
    {
      $this->nombre = $nombre;
      $this->curso = $curso;
      $this->day_r = $day_r;
      $this->month_r = $month_r;
      $this->year_r = $year_r;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Tu certificado de asistencia está listo: ¡Accede ahora!')
                    ->view('mails.mailsLoads');
    }
}
