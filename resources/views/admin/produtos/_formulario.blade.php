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
    <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" id="titulo" placeholder="Insira o Título"
    value="{{old('titulo', $produtos->titulo)}}">
    @error('titulo')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="col-md-6">
    <label for="categoria" class="form-label">Categoria</label>
    <select name="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror">
        <option>Selecione a Categoria</option>

        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}" {{(isset($produtos->categoria_id) || old('id')) ? "selected":"" }}> {{ $categoria->titulo }} </option>
        @endforeach

    </select>

</div>

<div class="col-md-12">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea class="form-control @error('descricao') is-invalid @enderror" name="descricao" id="descricao" rows="10">{{old('descricao', $produtos->descricao)}}</textarea>
</div>

<div class="col-md-3">
    <label for="valor" class="form-label">Valor</label>
    <input type="text" class="form-control @error('valor') is-invalid @enderror" name="valor" id="valor" value="{{old('valor', $produtos->valor)}}">
</div>


<div class="col-md-12">
    @if ($produtos->foto)
        <img src="{{ $produtos->foto }}" alt="Foto do Produto" width="80">
    @endif
  </div>

<div class="col-md-12">
    <label for="foto" class="form-label">Foto</label>
    <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto">

</div>




<div class="col-6">
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{ route('admin.produtos.index') }}" class="btn btn-warning">Cancelar</a>
</div>

