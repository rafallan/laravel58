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

Route::group(['prefix' => '/painel', 'middleware' => 'auth'], function () {

    Route::resource('/categorias', 'Painel\CategoriasController');

    Route::resource('/generos', 'Painel\GenerosController');

    Route::resource('/obras', 'Painel\ObrasController');
});

/* --------------------------------------------------- */
/* Rotas Públicas
/* --------------------------------------------------- */

Route::get('/obras', function(){
    $obras = \Obra::orderBy('created_at')->paginate();

    return view('obras')->with(['obras' => $obras]);
});

Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    $obras = App\Models\Obra::orderBy('created_at', 'DESC')->paginate();

    return view('index')->with(['obras' => $obras]);
});
