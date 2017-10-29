<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viajero extends Model {

     public function viajes()
    {
        return $this->hasMany('App\Viaje');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'cedula', 'direccion', 'telefono'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
       
    ];
}
