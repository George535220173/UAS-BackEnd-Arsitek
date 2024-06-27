<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AuthCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $code; // Kode autentikasi yang akan dikirim

    /**
     * Buat instance pesan baru.
     *
     * @return void
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * Bangun pesan email.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Authentication Code') // Judul email
                    ->view('emails.authcode'); // View yang digunakan untuk email
    }
}
