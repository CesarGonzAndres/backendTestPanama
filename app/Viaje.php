<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viaje extends Model {

    public function viajeros()
    {
        return $this->hasOne('App\Viajero');
    }

    public function destinos()
    {
        return $this->hasOne('App\Destino');
    }

    public function origenes()
    {
        return $this->hasOne('App\Origen');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cod_viaje', 'num_plazas', 'fecha_realizacion', 'descripcion', 'viajero_id', 'destino_id', 'origen_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
       
    ];
}
