<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categoria;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{

    public function index()
    {
        $categorias = Categoria::paginate(15);
        // dd($categorias);
        return view('admin.categorias.index', [
            'categorias' => $categorias
        ]);
    }

    public function create()
    {

        return view('admin.categorias.cadastrar', [
            'categoria' => new Categoria()
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'titulo' => 'required',
            'cor' => 'required',
            'icone' => 'required'
        ]);

        $categoria = new Categoria();
        $categoria->titulo = $request->titulo;
        $categoria->cor = $request->cor;

        if ($request->hasFile('icone')) {

            //Upload com nome randomico do arquivo
            #  $iconePath = $request->file('icone')->store('public/icones');
            #  $categoria->icone = Storage::url($iconePath);

            //Upload mantendo o mesmo nome do arquivo
            $icone = $request->file('icone');
            $iconeNomeOriginal = $icone->getClientOriginalName();
            $iconePath = $icone->storeAs('public/icones', $iconeNomeOriginal);
            $categoria->icone = Storage::url($iconePath);
        }

        $categoria->save();

        return redirect()->route('admin.categorias.index')
            ->with('sucesso', 'Categoria Cadastrada com Sucesso!');
    }


    public function edit($id)
    {
        return view('admin.categorias.editar', [
            'categoria' => Categoria::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'cor' => 'required',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->titulo = $request->titulo;
        $categoria->cor = $request->cor;

        if ($request->hasFile('icone')) {

            Storage::delete('public/icones/' . basename($categoria->icone));

            $icone = $request->file('icone');
            $iconeNomeOriginal = $icone->getClientOriginalName();
            $iconePath = $icone->storeAs('public/icones', $iconeNomeOriginal);
            $categoria->icone = Storage::url($iconePath);
        }

        $categoria->save();

        return redirect()->route('admin.categorias.index')
            ->with('sucesso', 'Categoria Atualizada com Sucesso!');
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);

        if ($categoria->delete()) {

            Storage::delete('public/icones/' . basename($categoria->icone));

            return redirect()->route('admin.categorias.index')
                ->with('sucesso', 'Categoria Excluida com Sucesso!');
        } else {

            return redirect()->route('admin.categorias.index')
                ->with('erro', 'Houve um erro ao Excluir o registro!');
        }
    }
}
