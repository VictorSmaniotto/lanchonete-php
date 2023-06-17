<?php

namespace App\Http\Controllers\Api;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProdutoResource;

class ProdutoController extends Controller
{
    public function listarProdutos(Request $request)
    {

        $query = Produto::query();

        //http://lanchonete-php.test/api/produtos?busca=x-salada
        $query->when($request->has('busca'), function ($query) use ($request) {

            // $busca = $request->busca; $request->input('busca');
            $busca = $request->input('busca');
            return $query->where('titulo', 'like', "%$busca%");
        });

        //http://lanchonete-php.test/api/produtos?categoria_id=5
        $query->when($request->has('categoria_id'), function ($query) use ($request) {

            $categoria_id = $request->input('categoria_id');
            return $query->where('categoria_id', $categoria_id);
        });

        $produtos = $query->get();
        // $produtos = Produto::with('categoria')->get();

        return ProdutoResource::collection($produtos);
    }


    public function mostrarProduto($id)
    {
        $produto = Produto::find($id);

        if ($produto) {
            return new ProdutoResource($produto);
        } else {
            return response()->json([
                "mensagem" => "Produto não encontrado",
            ], 404);
        }
    }
}
