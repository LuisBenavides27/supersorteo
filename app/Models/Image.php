<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;


     //Relacion uno a uno Sorteo-Image
     public function sorteo(){
        return $this->belongsTo(Image::class);
    }
}
