<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{

    public function index()
    {
        return view('admin.usuarios.index', [
            'usuarios' => User::all()
        ]);
    }


    public function create()
    {
        return view('admin.usuarios.cadastrar', [
            'usuario' => new User()
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'password' => 'required',
            'imagem' => 'required',
            'perfil' => 'required',
        ]);


        $usuario = new User();
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->perfil = $request->perfil;

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $imagemNome = $imagem->hashName();
            $imagemPath = $imagem->storeAs('public/usuarios/', $imagemNome);
            $usuario->imagem = Storage::url($imagemPath);
        }


        $usuario->save();

        return redirect()->route('admin.usuarios.index')->with('sucesso', 'Usuário cadastrado com sucesso!');
    }


    public function edit($id)
    {
        return view('admin.usuarios.editar', [
            'usuario' => User::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'password' => 'sometimes',
            'imagem' => 'sometimes',
            'perfil' => 'required',
        ]);


        $usuario = User::findOrFail($id);
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->perfil = $request->perfil;

        if ($request->hasFile('imagem')) {
            Storage::delete('public/usuarios/' . basename($usuario->imagem));

            $imagem = $request->file('imagem');
            $imagemNome = $imagem->hashName();
            $imagemPath = $imagem->storeAs('public/usuarios/', $imagemNome);
            $usuario->imagem = Storage::url($imagemPath);
        }


        $usuario->save();

        return redirect()->route('admin.usuarios.index')->with('sucesso', 'Usuário atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $usuario = User::findOrFail($id);

        if ($usuario->delete()) {
            Storage::delete('public/usuarios/' . basename($usuario->imagem));

            return redirect()->route('admin.usuarios.index')->with('sucesso', 'Usuário Deletado com sucesso!');
        } else {
            return redirect()->route('admin.usuarios.index')->with('erro', 'Houve um erro ao Deletar o Usuário!');
        }
    }
}
