<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contacto = new Contacto;
        $contacto->name = $request->name;
        $contacto->telephone = $request->telephone;
        $contacto->email = $request->email;
        $contacto->description = $request->description;
        $contacto->save(); 

        //correo para usuario
        Mail::send('notificaciones/mailUser',['contacto' =>$contacto], function($message) use ($contacto){
            $message->from('notificaciones@mitiendita.com','Sorpresas Jaicel');
            $message->to('wasanchez@serdan.com.co');
            $message->subject('Has recibido un mensaje de '.$contacto->name);
        });
        //correo para cliente
        Mail::send('notificaciones/mailClient',['contacto' =>$contacto], function($message) use ($contacto){
            $message->from('notificaciones@mitiendita.com','Sorpresas Jaicel');
            $message->to($contacto->email);
            $message->subject('Copia de mensaje enviado por Sorpresas Jaicel');
        });
        $request->session()->flash('success', 'Mensaje enviado correctamente.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacto $contacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacto $contacto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacto $contacto)
    {
        //
    }
}
