<?php
 
//VIAJEROS
$router->get('viajero', ['uses' => 'ViajerosController@obtenerTodo']);
$router->get('viajero/{id}', ['uses' => 'ViajerosController@obtenerViajero']);
$router->post('viajero', ['uses' => 'ViajerosController@crearViajero']);
$router->put('viajero/{id}', ['uses' => 'ViajerosController@actualizarViajero']);
$router->delete('viajero/{id}', ['uses' => 'ViajerosController@borrarViajero']);

//ORIGENES
$router->get('origen', ['uses' => 'OrigenesController@obtenerTodo']);
$router->get('origen/{id}', ['uses' => 'OrigenesController@obtenerOrigen']);
$router->post('origen', ['uses' => 'OrigenesController@crearOrigen']);
$router->put('origen/{id}', ['uses' => 'OrigenesController@actualizarOrigen']);
$router->delete('origen/{id}', ['uses' => 'ViajerosController@borrarViajero']);

//DESTINOS
$router->get('destino', ['uses' => 'DestinosController@obtenerTodo']);
$router->get('destino/{id}', ['uses' => 'DestinosController@obtenerDestino']);
$router->post('destino', ['uses' => 'DestinosController@crearDestino']);
$router->put('destino/{id}', ['uses' => 'DestinosController@actualizarDestino']);
$router->delete('destino/{id}', ['uses' => 'DestinosController@borrarDestino']);

//VIAJES
$router->get('viaje', ['uses' => 'ViajesController@obtenerTodo']);
$router->get('viaje/{id}', ['uses' => 'ViajesController@obtenerViaje']);
$router->post('viaje', ['uses' => 'ViajesController@crearViaje']);
$router->put('viaje/{id}', ['uses' => 'ViajesController@actualizarViaje']);
$router->delete('viaje/{id}', ['uses' => 'ViajesController@borrarViaje']);