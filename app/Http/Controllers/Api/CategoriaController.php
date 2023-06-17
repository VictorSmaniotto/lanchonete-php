<?php

namespace App\Http\Controllers\Api;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    public function listarCategorias()
    {
        $categorias = Categoria::all(['id', 'titulo', 'cor', 'icone']);

        $dadosCategorias = $categorias->map(function ($categoria) {
            $categoria->cor = str_replace("#", "0xFF", $categoria->cor);
            $categoria->icone = url($categoria->icone);
            return $categoria;
        });

        return response()->json($dadosCategorias);
    }
}
