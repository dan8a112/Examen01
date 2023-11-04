<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Directorio;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function show($id){
        $directorio = Directorio::find($id);
        $contactos = Contacto::where('codigoEntrada',$id)->get();
        return view('vercontactos', compact('directorio','contactos'));
    }

    public function create($id){
        return view('agregarcontacto', compact('id'));
    }

    public function store(Request $request){

        $contacto = new Contacto();

        $contacto->codigoEntrada = $request->codigo;
        $contacto->nombre = $request->nombre;
        $contacto->apellido = $request->apellido;
        $contacto->telefono = $request->telefono;
        $contacto->save();
        
        return redirect()->route('directorios.index');
    }

    public function delete($id){
        $contacto = Contacto::find($id);
        return view('eliminar', compact('contacto'));
    }

    public function destroy($id){
        $contacto = Contacto::find($id);
        $contacto->delete();
        return redirect()->route('contactos.show',$contacto->codigoEntrada);
    }

}
