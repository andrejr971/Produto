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
        'uses' => 'ControladorProduto@categoriaIndex'
    ]);

    Route::post('/categoria', [
        'as' => 'novoCategoria',
        'uses' => 'ControladorProduto@categoriaForm'
    ]);

    Route::get('/novo', [
        'as' => 'novoProduto',
        'uses' => 'ControladorProduto@novoProd'
    ]);
});

Route::prefix('/estoque')->group(function() {
    Route::get('/', [
        'as' => 'Estoque',
        'uses' => 'ControladorEstoque@index'
    ]);

    Route::prefix('/chapas')->group(function() {
        Route::get('/', [
            'as' => 'estoqueChapas',
            'uses' => 'ControladorEstoque@chapasIndex'
        ]);

        Route::get('/add', [
            'as' => 'addChapa',
            'uses' => 'ControladorEstoque@addItemEstoque'
        ]);

        Route::post('/add', [
            'as' => 'addChapa',
            'uses' => 'ControladorEstoque@addItemEstoquePost'
        ]);
    });

    Route::prefix('/geral')->group(function() {
        Route::get('/add', [
            'as' => 'addGeral',
            'uses' => 'ControladorEstoque@addItemEstoqueGeral'
        ]);

        Route::post('/add', [
            'as' => 'addGeral',
            'uses' => 'ControladorEstoque@addItemEstoqueGeralPost'
        ]);
    });
});

Route::prefix('/fornecedor')->group(function(){
    Route::get('/', [
        'as' => 'fornecedor',
        'uses' => 'ControladorFornecedor@index'
    ]);

    Route::get('/novo', [
        'as' => 'novoFornecedor',
        'uses' => 'ControladorFornecedor@create'
    ]);

    Route::post('/novo', [
        'as' => 'novoFornecedor',
        'uses' => 'ControladorFornecedor@store'
    ]);
});
    

