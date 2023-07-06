<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\UsuarioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/





Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);



    Route::get('/usuarios', [UsuarioController::class, 'usuario']);
});

Route::get('/produtos', [ProdutoController::class, 'listarProdutos']);
Route::get('/produtos/{id}', [ProdutoController::class, 'mostrarProduto']);

Route::get('/categorias', [CategoriaController::class, 'listarCategorias']);
Route::post('/cadastrar', [UsuarioController::class, 'cadastrar']);

Route::post('/login', [AuthController::class, 'login']);
