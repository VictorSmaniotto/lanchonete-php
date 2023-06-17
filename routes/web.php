<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProdutoController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\CategoriaController;


//Rotas do Site

Route::get('/', [HomeController::class, 'index']);

Route::get('/produto/{id}', [HomeController::class, 'produto']);

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::post('/login/autenticar', [LoginController::class, 'autenticar'])->name('auth.login.autenticar');

Route::get('/cadastrar', [LoginController::class, 'registrar']);


Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('auth.login.logout');


    Route::get('admin', function () {
        return view('layouts.admin');
    });


    Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios.index');
    Route::get('/admin/usuarios/cadastrar', [UsuarioController::class, 'create'])->name('admin.usuarios.cadastrar');
    Route::post('/admin/usuarios/armazenar', [UsuarioController::class, 'store'])->name('admin.usuarios.armazenar');
    Route::get('/admin/usuarios/editar/{id}', [UsuarioController::class, 'edit'])->name('admin.usuarios.editar');
    Route::put('/admin/usuarios/atualizar/{id}', [UsuarioController::class, 'update'])->name('admin.usuarios.atualizar');
    Route::delete('/admin/usuarios/deletar/{id}', [UsuarioController::class, 'destroy'])->name('admin.usuarios.deletar');

    Route::get('/admin/categorias', [CategoriaController::class, 'index'])->name('admin.categorias.index');
    Route::get('/admin/categorias/cadastrar', [CategoriaController::class, 'create'])->name('admin.categorias.cadastrar');
    Route::post('/admin/categorias/armazenar', [CategoriaController::class, 'store'])->name('admin.categorias.armazenar');
    Route::get('/admin/categorias/editar/{id}', [CategoriaController::class, 'edit'])->name('admin.categorias.editar');
    Route::put('/admin/categorias/atualizar/{id}', [CategoriaController::class, 'update'])->name('admin.categorias.atualizar');
    Route::delete('/admin/categorias/deletar/{id}', [CategoriaController::class, 'destroy'])->name('admin.categorias.deletar');

    Route::get('/admin/produtos', [ProdutoController::class, 'index'])->name('admin.produtos.index');
    Route::get('/admin/produtos/cadastrar', [ProdutoController::class, 'create'])->name('admin.produtos.cadastrar');
    Route::post('/admin/produtos/armazenar', [ProdutoController::class, 'store'])->name('admin.produtos.armazenar');
    Route::get('/admin/produtos/editar/{id}', [ProdutoController::class, 'edit'])->name('admin.produtos.editar');
    Route::put('/admin/produtos/atualizar/{id}', [ProdutoController::class, 'update'])->name('admin.produtos.atualizar');
    Route::delete('/admin/produtos/deletar/{id}', [ProdutoController::class, 'destroy'])->name('admin.produtos.deletar');
});
