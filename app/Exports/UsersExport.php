<?php

namespace App\Exports;

use App\Models\Cliente;

//use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;


//class UsersExport implements FromQuery
class UsersExport implements FromQuery

{
    use Exportable;
    public $sorteoid;
    public function __construct(int $sorteoid)
    {
        $this->sorteoid = $sorteoid;
    }

    public function query()
    { 
        return Cliente::query()->where('grupo_id', $this->sorteoid)->whereStatus(2)->select('cedula','name','phone','zone')->orderBy('id','desc')->distinct();
    }
}
