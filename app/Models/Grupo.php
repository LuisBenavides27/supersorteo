<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = ['name','user_id'];

    //Relacion de uno a muchos inversa Users-Grupos
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relacion uno a uno Grupo-Clientes
    public function cliente(){
        return $this->hasOne(Image::class);
    }

}
