<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sorteo extends Model
{
    use HasFactory;

        protected $fillable = ['name','grupo','status','user_id'];

        //Relacion de uno a muchos inversa Users-Sorteos

        public function user(){
            return $this->belongsTo(User::class);
        }


        //Relacion de uno a muchos Sorteos-Clientes
        public function clientes(){
            return $this->hasMany(Cliente::class);
         }

        //Relacion uno a uno Sorteo-Image
        public function image(){
            return $this->hasOne(Image::class);
        }
}
