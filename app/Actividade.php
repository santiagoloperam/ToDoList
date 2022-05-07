<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Categoria;

class Actividade extends Model
{
    protected $fillable = [
        'nombre','descripcion','estado'
    ];

    public function user(){
        return $this->belongsTo(User::class,'usuario_id');
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class,'categoria_id');
    }
}
