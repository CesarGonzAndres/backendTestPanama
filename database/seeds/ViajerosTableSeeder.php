<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Viajero;

class ViajerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        

        factory(App\Viajero::class, 50)->create();
        /*factory(App\Viajero::class, 50)->create()->each(function($u) {
            $u->viajes()->save(factory(App\Viaje::class)->make());
        
        });*/
    }
}
