<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Carbon\Carbon;

class MessagesController extends Controller
{
    
    public function __construct() {

        $this->middleware('auth', ['except' => 'create']);
    }


    public function index()
    {
       $mensajes = Message::all();      

       //return view('mensajes.index', compact('mensajes'));
       return view('mensajes.index')->with('mensajes',$mensajes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mensajes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|email',
            'mensaje' => 'required|min:5|max:250'
        ]);
       
       $mensaje = new Message;
       $mensaje->nombre = $request->nombre;
       $mensaje->email = $request->email;
       $mensaje->mensaje = $request->mensaje;
       $mensaje->save();

       return back()->with('info','El mensaje fue enviado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mensaje = Message::findorFail($id);

        return view('mensajes.show', compact('mensaje'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mensaje = Message::findorFail($id);
       
        return view('mensajes.edit',compact('mensaje'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|email',
            'mensaje' => 'required|min:5|max:250'
        ]);
       
       $mensaje = Message::findorFail($id);
       $mensaje->update($request->all());

       return view('mensajes.show', compact('mensaje'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Message::findorFail($id)->delete();

        return redirect()->route('mensajes.index');
    }

    public function export() {
        

    }
}
