<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Origen extends Model {

     public function viajes()
    {
        return $this->belongsTo('App\Viaje');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo', 'descripcion', 'nombre'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
       
    ];
}
