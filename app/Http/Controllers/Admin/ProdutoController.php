<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produto;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{

    public function index()
    {
        $produtos = Produto::paginate(15);
        return view('admin.produtos.index', [
            'produtos' => $produtos
        ]);
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.produtos.cadastrar', [
            'categorias' => $categorias,
            'produtos' => new Produto()
        ]);
    }

    public function store(Request $request)
    {
        $fotoPath = '';
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoNomeOriginal = $foto->getClientOriginalName();
            $fotoPath = $foto->storeAs('public/produtos/', $fotoNomeOriginal);
        }

        $request->validate([
            'foto' => 'required',
            'titulo' => 'required',
            'descricao' => 'required',
            'valor' => 'required',
            'categoria_id' => 'required'
        ]);


        try {
            $produto = new Produto();
            $produto->titulo = $request->titulo;
            $produto->descricao = $request->descricao;
            $produto->valor = $request->valor;
            $produto->categoria_id = $request->categoria_id;
            $produto->foto = Storage::url($fotoPath);


            $produto->save();

            return redirect()->route('admin.produtos.index')->with('sucesso', 'Produto cadastrado com sucesso!');
        } catch (\Throwable $e) {
            return redirect()->back()->withInput()->with('erro', 'Ocorreu um erro ao cadastrar, por favor tente novamente!');
        }
    }

    public function edit($id)
    {
        $categorias = Categoria::all();
        $produtos = Produto::findOrFail($id);
        return view('admin.produtos.editar', [
            'categorias' => $categorias,
            'produtos' => $produtos
        ]);
    }

    public function update(Request $request, $id)
    {


        $request->validate([
            'foto' => 'required',
            'titulo' => 'required',
            'descricao' => 'required',
            'valor' => 'required',
            'categoria_id' => 'required'
        ]);


        try {
            $produto = Produto::findOrFail($id);
            $produto->titulo = $request->titulo;
            $produto->descricao = $request->descricao;
            $produto->valor = $request->valor;
            $produto->categoria_id = $request->categoria_id;



            if ($request->hasFile('foto')) {
                Storage::delete('public/produtos/' . basename($produto->foto));
                $foto = $request->file('foto');
                $fotoNomeOriginal = $foto->getClientOriginalName();
                $fotoPath = $foto->storeAs('public/produtos/', $fotoNomeOriginal);
                $produto->foto = Storage::url($fotoPath);
            }




            $produto->save();

            return redirect()->route('admin.produtos.index')->with('sucesso', 'Produto cadastrado com sucesso!');
        } catch (\Throwable $e) {
            return redirect()->back()->withInput()->with('erro', 'Ocorreu um erro ao cadastrar, por favor tente novamente!');
        }
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);

        if ($produto->delete()) {
            Storage::delete('public/produtos/' . basename($produto->foto));

            return redirect()->route('admin.produtos.index')->with('sucesso', 'Produto Deletado com sucesso!');
        } else {
            return redirect()->route('admin.produtos.index')->with('erro', 'Houve um erro ao Deletar o Produto!');
        }
    }
}
