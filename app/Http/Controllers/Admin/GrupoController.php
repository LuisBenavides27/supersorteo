<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grupo;
//use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GrupoController extends Controller
{
    public function __construct()
    {
      $this->middleware('can:admin.etiquetas.index');
    }

    public function create()
    {
        return view('admin.etiquetas.create');
    }

    public function store(Request $request){
      //   return "Las validaciones pasaron";
        $request->validate([
         'name' => 'required|unique:grupos',
         
        ]); 
        $grupo = Grupo::create($request->all());
        if($grupo){
            // return "se ha creado la etiqueta";
            Alert::toast('Se ha creado la etiqueta', 'success');
            return redirect()->route('admin.sorteos.index'); 
        }else{
             
            return redirect()->route('admin.sorteos.index')->with('danger','NO FUE POSIBLE CREAR LA ETIQUETA');
        }

              
     }

     public function index(){
        //return "este es el index";
        //$etiquetas = Grupo::where('user_id', auth()->user()->id)->get();

        return view('admin.etiquetas.index');
     }

     public function destroy(Grupo $sorteo){
      $sorteo->delete();
      Alert::toast('Etiqueta Eliminada', 'success');      
      return redirect()->route('admin.etiquetas.index');
  }
}