<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Kirim email dari form kontak
    public function sendEmail(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        // Kirim email ke alamat yang ditentukan
        Mail::to('hardwareretrostore@gmail.com')->send(new ContactMail($details));

        // Redirect balik ke halaman sebelumnya dengan pesan sukses
        return back()->with('message', 'Email sent successfully');
    }
}
