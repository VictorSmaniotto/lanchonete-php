@extends('layouts.auth')

@section('conteudo')
    <form action="{{ route('auth.login.autenticar') }}" method="post">
        @csrf
        <div class="text-center">
            <img class="mb-4" src="images/logo.png" alt="">
            <h1 class="h3 mb-3 fw-normal">Acessar</h1>
        </div>

        @if ($errors->any())
            <ul class="alert alert-danger p-2 list-unstyled">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        @endif

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">E-mail</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Senha</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me" name="remember"> Lembrar-me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>

    </form>
@endsection
