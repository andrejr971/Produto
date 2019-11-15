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

Route::get('/', function () {
    return view('home');
});

Route::prefix('/orcamento')->group(function() {
    Route::get('/', function() {
        return view('orcamentos.orcamentos');
    });
    Route::get('/', [
        'as' => 'orcamento',
        'uses' => 'ControladorOrcamento@index'
    ]);

    Route::get('/novo', 'ControladorOrcamento@create');
});

Route::prefix('/produto')->group(function() {
    Route::get('/', [
        'as' => 'produtos',
        'uses' => 'ControladorProduto@index'
    ]);

    Route::get('/grupo', [
        'as' => 'novoGrupo',
        'uses' => 'ControladorProduto@create'
    ]);

    Route::post('/grupo', [
        'as' => 'novoGrupo',
        'uses' => 'ControladorProduto@store'
    ]);

    Route::get('/categoria', [
        'as' => 'novoCategoria',
        'uses' => 'ControladorProduto@store'
    ]);
});
    

