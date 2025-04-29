<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos.css">
    <script src="../meusscripts.js"></script>
    <style>
    body{
        background-image: url("assets/img/fundo.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
</head>
<body class="text-light">

    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . "/projeto_pokedex/controller/conexao.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/projeto_pokedex/controller/pokeDAO.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/projeto_pokedex/model/pokemon.php";

        $codigo = "";
        $nome = "";
        $tipo1 = "";
        $tipo2 = "";
        $habitat = "";
        $cor = "";
        $evolucao = "";
        $altura = "";
        $peso = "";



        if(isset($_GET["acaoExcluir"])){
            $codigo = $_GET["acaoExcluir"];
            PokeDAO::excluir($codigo);
        }

        ?>

<div class="container bg-dark">

<div class="row text-center" id="cabecalho">
    <div class="col-lg-12 align-self-center">
        <img src="/projeto_pokedex/assets/img/logo.png" id="imgBanner" style="width: 20%;">
    </div>
    <div class="col-lg-12 align-self-center">
        <h1>Consultar Pokedex</h1>
        <form action="pokedex0.php">
        <button type="submit" name="acaoOrdenar" value="asc" class="btn bg-transparent text-light">↑</button>
        <button type="submit" name="acaoOrdenar" value="desc" class="btn bg-transparent text-light">↓</button>
        </form>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-12">
        <table class="table bg-light text-dark table-striped table-borderless">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>TIPO 1</th>
                    <th>TIPO 2</th>
                    <th>HABITAT</th>
                    <th>COR</th>
                    <th>EVOLUÇÃO</th>
                    <th>ALTURA</th>
                    <th>PESO</th>
                    <th>
                        <a href="index.php"><button type="button" class="btn btn-danger" name="acaoVoltar" onclick="window.location.href='/index.php'">Voltar</button></a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_GET["acaoOrdenar"])){
                        $todosPokemon = PokeDAO::mostrarTodos($_GET["acaoOrdenar"]);
                    } else {
                        $todosPokemon = PokeDAO::mostrarTodos("");
                    }

                    foreach($todosPokemon as $pokemonPosicao){
                        echo "
                            <tr>
                                <td>$pokemonPosicao->id</td>
                                <td>$pokemonPosicao->nome</td>
                                <td>$pokemonPosicao->tipo1</td>
                                <td>$pokemonPosicao->tipo2</td>
                                <td>$pokemonPosicao->habitat</td>
                                <td>$pokemonPosicao->cor</td>
                                <td>$pokemonPosicao->evolucao</td>
                                <td>$pokemonPosicao->altura</td>
                                <td>$pokemonPosicao->peso</td>
                                <td>

                                    <form action='index.php' class='d-inline'>
                                        <button type='submit' name='acaoEditar' class='btn btn-success btn-sm' value='$pokemonPosicao->id'>Editar</button>
                                    </form>

                                    <form action='pokedex.php' class='d-inline'>
                                        <button type='submit' class='btn btn-danger btn-sm' name='acaoExcluir' value='$pokemonPosicao->id'>Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

