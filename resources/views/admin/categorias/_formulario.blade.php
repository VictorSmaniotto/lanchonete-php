@csrf
@if ($errors->any())
    <ul class="alert alert-danger p-2 list-unstyled">
        @foreach ($errors->all() as $erro)
            <li>{{ $erro }}</li>
        @endforeach
    </ul>
@endif


<div class="col-md-12">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" id="titulo" placeholder="Insira o Título" value="{{ old('titulo', $categoria->titulo) }}">
    @error('titulo')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
</div>

<div class="col-md-3">
    <label for="cor" class="form-label">Cor</label>
    <input type="color" class="form-control @error('titulo') is-invalid @enderror" name="cor" id="cor" value="{{ old('cor', $categoria->cor) }}">
    @error('cor')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
</div>

<div class="col-md-12">
  @if ($categoria->icone)
      <img src="{{ $categoria->icone }}" alt="icone da categoria" width="80">
  @endif
</div>

<div class="col-md-12">
    <label for="icone" class="form-label">Ícone</label>
    <input type="file" class="form-control @error('titulo') is-invalid @enderror" name="icone" id="icone">
    @error('icone')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
</div>


<div class="col-12">
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
