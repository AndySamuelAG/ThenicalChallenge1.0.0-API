<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->welcome();
});

$app->group(['prefix' => 'api'], function () use ($app) {
    $app->get('biblioteca', 'App\Http\Controllers\BibliotecasController@all');
    $app->get('biblioteca/{id}', 'App\Http\Controllers\BibliotecasController@get');
    $app->post('biblioteca', 'App\Http\Controllers\BibliotecasController@add');
    $app->put('biblioteca/{id}', 'App\Http\Controllers\BibliotecasController@put');
    $app->delete('biblioteca/{id}', 'App\Http\Controllers\BibliotecasController@remove');

    $app->get('biblioteca/{id}/persona', 'App\Http\Controllers\PersonasController@fromBiblioteca');
    $app->get('biblioteca/{id}/persona/{tipo}', 'App\Http\Controllers\PersonasController@fromBibliotecaTipo');

    $app->get('persona', 'App\Http\Controllers\PersonasController@all');
    $app->get('persona/{id}', 'App\Http\Controllers\PersonasController@get');
    $app->post('persona', 'App\Http\Controllers\PersonasController@add');
    $app->put('persona/{id}', 'App\Http\Controllers\PersonasController@put');
    $app->delete('persona/{id}', 'App\Http\Controllers\PersonasController@remove');

    $app->get('material', 'App\Http\Controllers\MaterialsController@all');
    $app->get('material/{id}', 'App\Http\Controllers\MaterialsController@get');
    $app->post('material', 'App\Http\Controllers\MaterialsController@add');
    $app->put('material/{id}', 'App\Http\Controllers\MaterialsController@put');
    $app->delete('material/{id}', 'App\Http\Controllers\MaterialsController@remove');

    $app->get('prestamo', 'App\Http\Controllers\PrestamosController@activos');
    $app->get('prestamo/{id}', 'App\Http\Controllers\PrestamosController@get');
    $app->post('prestamo/llevar', 'App\Http\Controllers\PrestamosController@llevar');
    $app->post('prestamo/dejar', 'App\Http\Controllers\PrestamosController@dejar');
    $app->put('prestamo/{id}', 'App\Http\Controllers\PrestamosController@put');
    $app->delete('prestamo/{id}', 'App\Http\Controllers\PrestamosController@remove');
});
/**
 * Routes for resource biblioteca
 */

//$app->get('biblioteca', 'BibliotecasController@all');
//$app->get('biblioteca/{id}', 'BibliotecasController@get');
//$app->post('biblioteca', 'BibliotecasController@add');
//$app->put('biblioteca/{id}', 'BibliotecasController@put');
//$app->delete('biblioteca/{id}', 'BibliotecasController@remove');

/**
 * Routes for resource persona
 */

//$app->get('persona', 'PersonasController@all');
//$app->get('persona/{id}', 'PersonasController@get');
//$app->post('persona', 'PersonasController@add');
//$app->put('persona/{id}', 'PersonasController@put');
//$app->delete('persona/{id}', 'PersonasController@remove');

/**
 * Routes for resource material
 */

//$app->get('material', 'MaterialsController@all');
//$app->get('material/{id}', 'MaterialsController@get');
//$app->post('material', 'MaterialsController@add');
//$app->put('material/{id}', 'MaterialsController@put');
//$app->delete('material/{id}', 'MaterialsController@remove');

/**
 * Routes for resource prestamo
 */

//$app->get('prestamo', 'PrestamosController@all');
//$app->get('prestamo/{id}', 'PrestamosController@get');
//$app->post('prestamo', 'PrestamosController@add');
//$app->put('prestamo/{id}', 'PrestamosController@put');
//$app->delete('prestamo/{id}', 'PrestamosController@remove');
