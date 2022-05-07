<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Actividade;
use App\User;

class Categoria extends Model
{
     protected $fillable = [
        'nombre'
    ];

    public function actividades()
    {
        return $this->hasMany(Actividade::class,'actividad_id'); 
    }

    public function user(){
        return $this->belongsTo(User::class,'usuario_id');
    }
}
