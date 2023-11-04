<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Directorio;
use Illuminate\Http\Request;

class DirectorioController extends Controller
{
    public function index(){
        $directorios = Directorio::all();
        return view('directorio', compact('directorios'));
    }

    public function create(){
        return view('crearEntrada');
    }

    public function store(Request $request){
        $directorio = new Directorio();

        $directorio->codigoEntrada = $request->codigo;
        $directorio->nombre = $request->nombre;
        $directorio->apellido = $request->apellido;
        $directorio->telefono = $request->telefono;
        $directorio->correo = $request->correo;
        $directorio->save();
        
        return redirect()->route('directorios.index');
    }

    public function search(){
        return view('buscar');
    }

    public function ask(Request $request){
        $directorio = Directorio::where('correo',$request->correo)->get();
        if(count($directorio)!=0){
            return redirect()->route('contactos.show',$directorio[0]->codigoEntrada);
        }
        return "No se encontro el registro especificado";
    }

    public function delete($id){
        $directorio = Directorio::find($id);
        return view('eliminarDirectorio', compact('directorio'));
    }

    public function destroy($id){
        $contactos = Contacto::where('codigoEntrada',$id)->get();
        foreach ($contactos as $contacto) {
            $contacto->delete();
        }
        $directorio = Directorio::find($id);
        $directorio->delete();
        return redirect()->route('directorios.index');
    }
}

