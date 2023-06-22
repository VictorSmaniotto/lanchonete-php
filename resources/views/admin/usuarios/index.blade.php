@extends('layouts.admin')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Usuários</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <!-- Botão na Esquerda -->
            <a href="{{ route('admin.usuarios.cadastrar') }}"
               class="btn btn-primary">Cadastrar</a>
        </div>
    </div>

    @include('includes.alerta')


    <div class="conteudo-admin">

        <div class="tabela-registros">
            <h4 class="py-3">Lista de Usuários</h4>
            <div class="table-responsive mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"
                                width="50">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col"
                                width="100">Ação</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($usuarios as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->nome }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="d-flex">
                                <a href="{{ route('admin.usuarios.editar', $user->id) }}"
                                   class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                   <form action="{{ route('admin.usuarios.deletar', $user->id) }}"
                                    method="post"
                                    class="d-inline">
                                  @method('delete')
                                  @csrf

                                  <button class="btn btn-danger btn-sm ms-1"
                                          onclick="return confirm('Tem certeza que deseja excluir o registro?')">
                                      <i class="fas fa-trash"></i>
                                  </button>

                              </form>

                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>

            </div>

        </div>

    </div>
@endsection
