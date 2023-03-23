<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['cedula','name','zone','phone','status','sorteo_id','grupo_id'];

    //Relacion de uno a muchos Inversa Clientes-Sorteos
    public function sorteo(){
        return $this->belongsTo(Sorteo::class);
    }

    //Relacion inversa uno a uno Grupo-Clientes
        public function grupo(){
            return $this->belongsTo(Image::class);
        }

}
