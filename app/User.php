<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
 
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Categoria;
use App\Actividade;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



     public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function categorias()
    {
        return $this->hasMany(Categoria::class,'usuario_id'); 
    }

    public function actividades()
    {
        return $this->hasMany(Actividade::class,'usuario_id'); 
    }
    
}
