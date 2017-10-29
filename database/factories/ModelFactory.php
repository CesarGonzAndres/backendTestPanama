<?php

use App\Viaje;
use App\Viajero;
use App\Origen;
use App\Destino;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Viajero::class, function (Faker\Generator $faker) {
   
    return [
        'nombre' => $faker->name,
        'cedula' => $faker->unique()->ean8,
        'direccion' => $faker->country,
        'telefono' => $faker->phoneNumber
    ];

});

$factory->define(App\Destino::class, function (Faker\Generator $faker) {
   
    $firstLetter = $faker->randomLetter;
    $numberSetOne = $faker->numberBetween($min = 10, $max = 99);
    $numberSetTwo = $faker->numberBetween($min = 10, $max = 99);
    $codigo = strtoupper($firstLetter) . $numberSetOne . '.' . $numberSetTwo;

    return [
        'codigo' => $codigo,
        'descripcion' => $faker->realText,
        'nombre' => $faker->country
    ];

});

$factory->define(App\Origen::class, function (Faker\Generator $faker) {
   
    $firstLetter = $faker->randomLetter;
    $numberSetOne = $faker->numberBetween($min = 10, $max = 99);
    $numberSetTwo = $faker->numberBetween($min = 10, $max = 99);
    $codigo = strtoupper($firstLetter) . $numberSetOne . '.' . $numberSetTwo;

    return [
        'codigo' => $codigo,
        'descripcion' => $faker->realText,
        'nombre' => $faker->country
    ];

});

$factory->define(App\Viaje::class, function (Faker\Generator $faker) {
   
   $firstLetter = $faker->randomLetter;
   $numberSetOne = $faker->numberBetween($min = 10, $max = 99);
   $numberSetTwo = $faker->numberBetween($min = 10, $max = 99);
   $cod_viaje = strtoupper($firstLetter) . $numberSetOne . '.' . $numberSetTwo;

   return [
        'cod_viaje' => $cod_viaje,
        'num_plazas' => $faker->randomDigit,
        'fecha_realizacion' => $faker->date,
        'descripcion' => $faker->realText,
        'viajero_id' => $faker->numberBetween($min = 1, $max = 50),
        'origen_id' => $faker->numberBetween($min = 1, $max = 50),
        'destino_id' => $faker->numberBetween($min = 1, $max = 50)
    ];
    
});