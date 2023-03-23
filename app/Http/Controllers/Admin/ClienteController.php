<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Exports\ClientesExport;
use App\Exports\UsersExport;
use App\Models\Grupo;
use App\Models\Sorteo;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Stmt\Return_;
use RealRashid\SweetAlert\Facades\Alert;

class ClienteController extends Controller
{
    public function __construct()
    {
      $this->middleware('can:admin.clientes.index')->only('index');
    }

    public function index()
    {
       $clientes = DB::table('sorteos')
        ->join('clientes', function ($join) {
            $id = auth()->user()->id;
            $join->on('sorteos.id', '=', 'clientes.sorteo_id')
                 ->where('sorteos.user_id', $id)
                 ->where('clientes.status', 2);
        })->distinct('clientes.cedula')
          ->select('sorteos.name as sorteo','cedula','phone','zone','clientes.name as cliente')
          ->paginate(10);
       
        return view('admin.clientes.index', compact('clientes'));
    }
   
    public function edit($sorteo)
    {
        return view('admin.clientes.image', compact('sorteo'));       
    }

    public function export($sorteo) 
    {  
        $ids = Sorteo::where('id',$sorteo)->get();
        $status = $ids[0]['status'];
        $validar = Cliente::where('sorteo_id', $sorteo)->where('status','2')->get();
            
        if(count($validar)>0 && $status==2){
            return (new ClientesExport($sorteo))->download($sorteo.'ClientesGandores.xlsx');
        }else{
            Alert::error('No se puede imprimir reporte', 'Este sorteo aun no se ha realizado, finalizado o no tiene clientes ganadores');      
            return redirect()->route('admin.sorteos.index');
        } 

    }

    public function estado(Cliente $ganador, Sorteo $sorteo)
    {      
         if($sorteo->grupo==2){
            Cliente::where('cedula', $ganador->cedula)->where('grupo_id',$ganador->grupo_id)->update(['status' => 2]);
            return view('admin.sorteos.girar', compact('sorteo'));
        } elseif($sorteo->grupo==1){
            Cliente::where('sorteo_id', $ganador->sorteo_id)->where('cedula', $ganador->cedula)->update(['status' => 2]);  
            return view('admin.sorteos.girar', compact('sorteo'));
        } 
        return view('admin.sorteos.girar', compact('sorteo'));       
    }

    public function create(){
        //return view('admin.clientes.create');
        $grupos = Grupo::where('user_id', auth()->user()->id)->get();
        
        return view('admin.clientes.create', compact('grupos'));
    }

    public function repo(Request $request){
        $sorteo = $request->etiqueta;
        return (new UsersExport($sorteo))->download($sorteo.'ClientesGandores.xlsx');
   

    }

}