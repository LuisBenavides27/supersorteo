<?php

namespace App\Imports;

use App\Models\Cliente;
use App\Models\Sorteo;
use Illuminate\Contracts\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
//use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Ramsey\Uuid\Type\Integer;

class ClientesImport implements ToModel,WithBatchInserts, WithChunkReading ,WithValidation
{
    public $sorteo;
    public $grupo;
    
    public function __construct($sorteo,$grupo){
        
        $this->sorteo = $sorteo;
        $this->grupo = $grupo;
    
    
    }

            

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Cliente([            
            'cedula'  => $row[0],
            'name'    => $row[1], 
            'zone'    => $row[2], 
            'phone'   => $row[3], 
            'sorteo_id'  => $this->sorteo,           
            'grupo_id'  => $this->grupo,           
        ]);   
    }

    public function batchSize(): int
    {
        return 4000;
    }
    
    public function chunkSize(): int
    {
        return 4000;
    }

    public function rules(): array
    {
        return [
            '*.0' => [
                'integer',
                'required'
            ],

        ];
                      
    }
}
