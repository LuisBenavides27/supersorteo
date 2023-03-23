<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSorteoRequest;
use App\Imports\ClientesImport;
use App\Models\Cliente;
use App\Models\Grupo;
use App\Models\Sorteo;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

use RealRashid\SweetAlert\Facades\Alert;

class SorteoController extends Controller
{
    public function __construct()
    {
      $this->middleware('can:admin.sorteos.index');
    }

    public function index()
    {
      $etiqueta = Grupo::where('user_id', auth()->user()->id)->get();        
       return view('admin.sorteos.index',compact('etiqueta'));
    }

    public function create()
    {
        return view('admin.sorteos.create');
    }

    public function store(Request $request){
       // return "Las validaciones pasaron";
        $request->validate([
            'name' => 'required',
            'status' => 'required|in:1,2,3'
        ]); 
        $sorteo = Sorteo::create($request->all());
        if($request->clientes){
            $sorteo->clientes()->attach([$request->clientes]);
        }
        return redirect()->route('admin.sorteos.index');          
    }

    public function show(Sorteo $sorteo){        
        return view('admin.sorteos.show', compact('sorteo'));
    }

    public function edit(Sorteo $sorteo) {
        $grupos = Grupo::where('user_id', auth()->user()->id)->get();
        return view('admin.sorteos.edit', compact('sorteo','grupos'));
    }

    public function destroy(Sorteo $sorteo){
        $sorteo->delete();
        Alert::toast('Sorteo Eliminado', 'success');      
        return redirect()->route('admin.sorteos.index');
    }
    
    public function vistaimportar(Sorteo $sorteo){
        return view('admin.sorteos.importar', compact('sorteo'));
    }

    public function importar(Request $request){       
        
        $file = $request->file('documento');      
        if($file->getClientOriginalExtension() == 'csv' or $file->getClientOriginalExtension() == 'xlsx' or $file->getClientOriginalExtension() == 'txt'){

            Excel::import(new ClientesImport($request->clave,$request->etiqueta), $request->file('documento'));
            alert()->success('Clientes Agregados','Se han agregado los clientes al sorteo')->showConfirmButton('Ok', '#3085d6');
            if($request->etiqueta == null){
                Sorteo::where('id', $request->clave)->update(['grupo' => 1]);
            }elseif($request->etiqueta != null){
                Sorteo::where('id', $request->clave)->update(['grupo' => 2]);
            }            
            return redirect()->route('admin.sorteos.index'); 
       } else{
        Alert::toast('No fue posible insertar clientes', 'danger');      
        return redirect()->route('admin.sorteos.index')->with('danger', 'No fue posible agregar clientes al sorteo con ID '.$request->clave.' porque la extension del archivo es incorrecta, revisala y vuelve a intentarlo');;
       }
         
    }

    public function realizar(){        
       return view('admin.sorteos.realizar');
    }
    
    public function girar(Sorteo $sorteo){
        $id = $sorteo->id;                
        $cliente = Cliente::where('sorteo_id',$id)->get();
        if(count($cliente) > 0 ){            
            return view('admin.sorteos.girar', compact('sorteo'));
        }else{
            return redirect()->route('admin.sorteos.realizar')->with('danger', '¡NO PUEDES INICIAR!, El '.$sorteo->name.' no tiene clientes agregados. Dirigete a Gestion sorteos y agrega a los participantes');
        }
    }

    public function ganador(Sorteo $sorteo){           
        $id_sorteo = $sorteo['id'];
        $ganador = Cliente::where('sorteo_id',$id_sorteo)->where('status','1')->get();  
         if(count($ganador)>0){
            $ganador = Cliente::where('sorteo_id',$id_sorteo)->where('status','1')->get()->random();
            return view('admin.sorteos.ganador', compact('sorteo','ganador'));
         } else {
            return redirect()->route('admin.sorteos.girar',$sorteo)->with('danger', '¡ESTE SORTEO YA NO TIENE CLIENTES DISPONILES PARA PARTICIPAR!, por favor finaliza para continuar');
         }            
    }   

    public function finalizar(Sorteo $sorteo){   
        $id = $sorteo->id;
        Sorteo::where('id', $id)->update(['status' => 2]);  
        $sorteos = Sorteo::where('id',$id)->get();
        return view('admin.index');
    }
}