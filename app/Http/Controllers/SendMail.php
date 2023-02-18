<?php

namespace App\Http\Controllers;

// controlador del envio de correo
use App\Http\Requests\sendemailrequest;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;


class SendMail extends Controller
{

    public function index()
    {
        return view('contacto');
    }

    public function store(sendemailrequest $request)
    {
        $correo = new ContactanosMailable($request->all() + ['nombre' => Auth()->user()->email]);

        Mail::to('islenderdenilson2@gmail.com')->send($correo);

        return back()->with('status', 'Correo Enviado');
    }
}
