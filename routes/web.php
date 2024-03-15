<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorCategoria;
use App\Http\Controllers\ControladorProduto;

Route::get('/', function () {
    return view('index');
});

// Rotas de categorias
Route::get('/categorias', [ControladorCategoria::class, 'index']);

Route::get('categorias/novo', [ControladorCategoria::class, 'create']);

Route::post('/categorias', [ControladorCategoria::class, 'store']);

Route::get('/categorias/apagar/{id}', [ControladorCategoria::class, 'destroy']);

Route::get('/categorias/editar/{id}', [ControladorCategoria::class, 'edit']);

Route::post('/categorias/{id}', [ControladorCategoria::class, 'update']);


// Rotas de produtos
Route::get('/produtos', [ControladorProduto::class, 'index']);

Route::get('produtos/novo', [ControladorProduto::class, 'create']);

Route::post('/produtos', [ControladorProduto::class, 'store']);

Route::get('/produtos/editar/{id}', [ControladorProduto::class, 'edit']);

Route::post('/produtos/{id}', [ControladorProduto::class, 'update']);

Route::get('/produtos/apagar/{id}', [ControladorProduto::class, 'destroy']);