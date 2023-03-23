<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sorteo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\UsersExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function index()
    {
        
        return view('admin.index');
    }

    public function realizar()
    {
       
        $sorteos = Sorteo::all();
        return view('admin.sorteos.realizar',  compact('sorteos'));
    }

    public function reportes()
    {
        
        return view('admin.reportes.index');
    }

    public function reportescrear()
    {
        return view('admin.reportes.create');
    }

    public function pdf()
    {
        $data = DB::table('clientes')->whereStatus('2')->value('cedula','name','zone','phone');
        //$data = Sorteo::all();
        return view('admin.reportes.create', compact('data'));        

    }

    public function download(){
        $data = Sorteo::all();
      //  $pdf = Pdf::loadView('admin.reportes.create', compact('data'));
       // return $pdf->download();
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users1.pdf');
    }
}
