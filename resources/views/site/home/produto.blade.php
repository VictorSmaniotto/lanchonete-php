@extends('layouts.site')

@section('conteudo')
    <div class="produto">
        <div class="item-produto">
            <img src="/img/hamburger1.jpg"
                 alt="Lanche"
                 class="img-fluid" />

            <h2>X-Salada</h2>

            <small class="descricao">Pão, hambuger, alface, tomate e maionese especial</small>

            <div class="box-preco">
                <span class="preco">R$ 10,00</span>

                <a href="#"
                   class="btn-adicionar">
                    <i class="icon-adicionar"></i>
                </a>
            </div>
        </div>

    </div>
@endsection
