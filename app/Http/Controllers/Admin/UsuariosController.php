<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsuariosController extends Controller
{
   public function __construct()
   {
     $this->middleware('can:admin.usuarios.index');
   }

    public function index()
    {
       // $users = User::all();
        return view('admin.usuarios.index');
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show(User $usuario)
    {
        $pass = Hash::make('SSN2023*');
      
        $user =  User::where('email', $usuario->email)->update(['password' => $pass]);       
        
        if($user){
            return redirect()->route('admin.usuarios.index')->with('info','Se ha realizado cambio de contraseña, el correo :'.$usuario->email.' ahora ingresa con la contraseña : SSN2023*');             
         } else{
            return redirect()->route('admin.usuarios.index')->with('danger','¡¡¡ ALGO SALIO MAL !!! No se pudo resetear contraseña de '.$usuario->correo); 
        }   
    }

    
    public function edit(User $usuario)
    {
        $roles = Role::all();
        return view('admin.usuarios.edit', compact('usuario','roles'));
    }

   
    public function update(Request $request,User  $usuario)
    {
        $usuario->roles()->sync($request->roles);
        return redirect()->route('admin.usuarios.edit', $usuario)->with('info', 'Se asigno rol');
    }

   
    public function destroy( $usuario)
    {
        //
    }

    
}
