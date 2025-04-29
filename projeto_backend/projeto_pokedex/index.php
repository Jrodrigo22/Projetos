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



        if(isset($_GET["acaoGravar"])){
            $codigo=$_GET["acaoGravar"];
            if($codigo==""){
                $dadosPokemonNovo = [
                    "",
                    $_GET["nome"],
                    $_GET["tipo1"],
                    $_GET["tipo2"],
                    $_GET["habitat"],
                    $_GET["cor"],
                    $_GET["evolucao"],
                    $_GET["altura"],
                    $_GET["peso"]
                ];
                $pokemonNovo = new Pokemon($dadosPokemonNovo);
                PokeDAO::inserir($pokemonNovo);
            } else {
                $dadosPokemonEditado = [
                    $codigo,
                    $_GET["nome"],
                    $_GET["tipo1"],
                    $_GET["tipo2"],
                    $_GET["habitat"],
                    $_GET["cor"],
                    $_GET["evolucao"],
                    $_GET["altura"],
                    $_GET["peso"]
                ];
                $pokemonEditado = new Pokemon($dadosPokemonEditado);
                PokeDAO::editar($pokemonEditado);
            }
        }

        if(isset($_GET["acaoEditar"])){
            $codigo = $_GET["acaoEditar"];
            $pokemonEscolhido = PokeDAO::consultar($codigo);
            $nome = $pokemonEscolhido->nome;
            $tipo1 = $pokemonEscolhido->tipo1;
            $tipo2 = $pokemonEscolhido->tipo2;
            $habitat = $pokemonEscolhido->habitat;
            $cor = $pokemonEscolhido->cor;
            $evolucao = $pokemonEscolhido->evolucao;
            $altura = $pokemonEscolhido->altura;
            $peso = $pokemonEscolhido->peso;
        }

        ?>

    <div class="container bg-dark">
       
        <div class="row text-center" id="cabecalho">    
            
            <div class="col-lg-12">
            <img src="/projeto_pokedex/assets/img/logo.png" id="imgBanner" style="width: 20%;"> 
            </div>
            
            <div class="col-lg-12 align-self-center">
                <h1>Cadastro de Pokemon</h1>
            </div>
        </div>  

        <form action="index.php" class="d-flex flex-column">
        <div class="col-lg-12">
            <div class="row bg-light text-dark pt-2 pb-2">
            
                <div class="col-lg-4">
                    <strong>Nome</strong>
                    <input type="text" name="nome" class="form-control" value="<?php echo $nome?>">
                </div> 

                <div class="col-lg-2">
                <strong>Tipo 1</strong>
                    <input type="text" name="tipo1" class="form-control" value="<?php echo $tipo1?>">
                </div> 

                <div class="col-lg-2">
                <strong>Tipo 2</strong>
                    <input type="text" name="tipo2" class="form-control" value="<?php echo $tipo2?>">
                </div> 

                <div class="col-lg-3">
                    <strong>Habitat</strong>
                    <input type="text" name="habitat" class="form-control" value="<?php echo $habitat?>">
                </div>

                <div class="col-lg-1">
                    <strong>Evolução</strong>
                    <select name="evolucao" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                
                <div class="col-lg-4">
                    <strong>Cor</strong>
                    <input type="text" name="cor" class="form-control" value="<?php echo $cor?>">
                </div>
                
                <div class="col-lg-4">
                    <strong>Altura (Metros)</strong>
                    <input type="number" step="any" name="altura" class="form-control" value="<?php echo $altura?>">
                </div> 

                <div class="col-lg-4">
                    <strong>Peso (KG)</strong>
                    <input type="number" step="any" name="peso" class="form-control" value="<?php echo $peso?>">
                </div> 

                <div class="container text-center pt-3" id="botoes">
                    <div class="row">
                        <div class="col">
                        <button type="submit" class="btn btn-success" name="acaoGravar" value="<?php echo $codigo?>">Salvar</button>
                        </div>
                        <div class="col">
                        <a href="pokedex.php"><button type="button" class="btn btn-primary" name="acaoConsultar" onclick="window.location.href='pokedex.php'">Consultar</button></a>
                        </div>
                     </div>
                </div>

            </div>
    </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

