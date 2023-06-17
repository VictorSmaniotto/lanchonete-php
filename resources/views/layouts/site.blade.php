<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0" />
    <title>Lanchonete Burguer</title>
    <meta name="description"
          content="Lanchonete Burguer, a melhor Lanchonete de Marília" />
    <meta name="keywords"
          content="lanche, porção, pizza" />

    <link rel="stylesheet"
          href="/icones/icones.css" />

    <link rel="preconnect"
          href="https://fonts.googleapis.com" />
    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap"
          rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
          crossorigin="anonymous" />

    <link rel="stylesheet"
          href="/css/main.css" />
</head>

<body>
    <header id="cabecalho">
        <div id="barra-topo">
            <div id="btnMenu">
                <i class="icon-menu"></i>
            </div>
            <div id="logotipo">
                <h1>
                    <img src="/img/logotipo.png"
                         alt="Lanchonete Burguer"
                         height="40" />
                </h1>
            </div>

            <nav id="menu-principal">
                <button id="btnClose">&#10006;</button>

                <img src="/img/logotipo.png"
                     alt="Lanchonete Burguer"
                     height="40" />

                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Lanchonete</a></li>
                    <li><a href="#">Localização</a></li>
                    <li><a href="#">Contato</a></li>
                </ul>
            </nav>

            <div id="overlay"></div>

            <div id="usuario">
                <img src="/img/usuario.jpg"
                     class="formato-bolinha"
                     alt="Edson Rodrigues"
                     height="40" />
            </div>
        </div>

        <div id="pesquisar">
            <form action=""
                  method="get">
                <input type="search"
                       name="produto"
                       placeholder="Quer comer o que?" />
                <button type="submit">
                    <i class="icon-busca"></i>
                </button>
            </form>
        </div>
    </header>

    <main id="conteudo">

        @yield('conteudo')

    </main>

    <footer id="rodape">
        <nav id="menu-rodape">
            <ul>
                <li>
                    <a href="#"> <i class="icon-home"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-cesta"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-favorito"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-pedido"></i></a>
                </li>

                <li>
                    <a href="#"><i class="icon-usuario"></i></a>
                </li>
            </ul>
        </nav>
    </footer>

    <script src="/js/main.js"></script>
</body>

</html>
