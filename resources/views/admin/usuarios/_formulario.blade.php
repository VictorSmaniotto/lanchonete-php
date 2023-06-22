@csrf

@if ($errors->any())
    <ul class="alert alert-danger p-2 list-unstyled">
        @foreach ($errors->all() as $erro)
            <li>{{ $erro }}</li>
        @endforeach
    </ul>
@endif

<div class="col-md-12">
    <label for="nome"
           class="form-label">Nome</label>
    <input type="text"
           class="form-control"
           name="nome"
           id="nome"
           placeholder="Insira o Nome"
           value="{{ old('nome', $usuario->nome) }}">

</div>
<div class="col-md-12">
    <label for="email"
           class="form-label">E-mail</label>
    <input type="text"
           name="email"
           class="form-control"
           id="email"
           placeholder="Insira a E-mail"
           value="{{ old('email', $usuario->email) }}">

</div>
<div class="col-md-12">
    <label for="senha"
           class="form-label">Senha</label>
    <input type="password"
           name="password"
           class="form-control"
           id="password"
           placeholder="">

</div>

<div class="col-md-3">
    <label for="perfil"
           class="form-label">Perfil</label>
    <select class="form-control"
            id="perfil"
            name="perfil">
            <option value="cliente" {{ (old('perfil', $usuario->perfil) == 'cliente') ? 'selected' : '' }}>Cliente</option>
            <option value="administrador" {{ (old('perfil', $usuario->perfil) == 'administrador') ? 'selected' : '' }}>Administrador</option>
    </select>
</div>

<div class="col-md-12">
    @if ($usuario->imagem)
        <img src="{{ $usuario->imagem }}" alt="Foto do usuário" width="80">
    @endif
  </div>


<div class="col-md-12">
    <label for="Avatar"
           class="form-label">Avatar</label>
    <input type="file"
           class="form-control"
           name="imagem"
           id="imagem">
</div>

<div class="col-12">
    <button type="submit"
            class="btn btn-primary">Salvar</button>
    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-danger">Cancelar</a>
</div>
