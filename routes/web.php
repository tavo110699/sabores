<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 Route::get('/', function () {
    return view('welcome');
});
*/

//Ruta especial enlazada a travez de la palabra clave el producto
//Ruta esñecial: inyeccion de dependencias
Route::bind('producto',function ($idproducto){
    return App\Producto::where('idproducto',$idproducto)->first();
});

// Route::get('/', 'ProductosController@index');
Route::get('/', [
    'as' => 'inicio',
    'uses' => 'ProductosController@index'
]);

Route::get('producto/{idProducto}', [
    'as' => 'producto-detalle',
    'uses' => 'ProductosController@show'
]);

Route::get('carritoShow', [
    'as' => 'carrito',
    'uses' => 'CarritoController@show'
]);

Route::get('carrito/agregar/{producto}', [
    'as' => 'carrito-agregar',
    'uses' => 'CarritoController@add'
]);

Route::get('carrito/borrar/{producto}', [
    'as' => 'carrito-borrar',
    'uses' => 'CarritoController@delete'
]);

Route::get('carrito/actualizar/{producto}/{cantidad?}', [
    'as' => 'carrito-actualizar',
    'uses' => 'CarritoController@update'
]);

Route::get('orden-detalles', [
    'as' => 'orden-detalles',
    'uses' => 'CarritoController@ordenDetalles'
])->middleware('auth');

Route::get('payment',array(
    'as' => 'payment',
    'uses' => 'PaypalController@portPayment',
));

Route::get('payment/status',array(
    'as' => 'payment.status',
    'uses' => 'PaypalController@getPaymentStatus',
));

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
