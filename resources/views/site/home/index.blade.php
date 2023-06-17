@extends('layouts.site')

@section('conteudo')
    <div class="lista-categorias">
        <ul>
            <li>
                <div class="item-categoria">
                    <i class="icon-hambuger"></i>
                    <h2>Lanche</h2>
                </div>
            </li>
            <li>
                <div class="item-categoria">
                    <i class="icon-porcao"></i>
                    <h2>Porção</h2>
                </div>
            </li>
            <li>
                <div class="item-categoria vermelho">
                    <i class="icon-bebida"></i>
                    <h2>Bebida</h2>
                </div>
            </li>
            <li>
                <div class="item-categoria roxo">
                    <i class="icon-suco"></i>
                    <h2>Suco</h2>
                </div>
            </li>
            <li>
                <div class="item-categoria">
                    <i class="icon-pizza"></i>
                    <h2>Pizza</h2>
                </div>
            </li>
        </ul>
    </div>

    <div class="lista-produtos">
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

        <div class="item-produto">
            <img src="img/hamburger1.jpg"
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

        <div class="item-produto">
            <img src="img/hamburger1.jpg"
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

        <div class="item-produto">
            <img src="img/hamburger1.jpg"
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
