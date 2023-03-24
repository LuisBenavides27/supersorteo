<?php

namespace App\Exports;

use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class ClientesExport implements FromQuery
{

    use Exportable;
    public $sorteoid;
   // public $sorteostatus;
    public function __construct(int $sorteoid)
    {
        $this->sorteoid = $sorteoid;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
      //  auth()->user()->id;
       // return Cliente::all();

        return Cliente::query()->where('sorteo_id', $this->sorteoid)->whereStatus(2)->select('cedula','name','phone','zone')->orderBy('id','desc')->distinct();
    }
}
