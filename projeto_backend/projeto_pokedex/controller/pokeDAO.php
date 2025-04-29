<?php

    class PokeDAO{
        public static function inserir(Pokemon $pokemon){
            $con = Conexao::getConexao();
            $sql = $con->prepare("insert into pokemon values (null,?,?,?,?,?,?,?,?)");
            $sql->bindParam(1, $pokemon->nome);
            $sql->bindParam(2, $pokemon->tipo1);
            $sql->bindParam(3, $pokemon->tipo2);
            $sql->bindParam(4, $pokemon->habitat);
            $sql->bindParam(5, $pokemon->cor);
            $sql->bindParam(6, $pokemon->evolucao);
            $sql->bindParam(7, $pokemon->altura);
            $sql->bindParam(8, $pokemon->peso);
            $sql->execute();

        }
        public static function editar(Pokemon $pokemon){
            $con = Conexao::getConexao();
            $sql = $con->prepare("update pokemon set NOME=?, TIPO_1=?, TIPO_2=?, HABITAT=?, COR=?, EVOLUCAO=?, ALTURA=?, PESO=? where id=?");
            $sql->bindParam(1, $pokemon->nome);
            $sql->bindParam(2, $pokemon->tipo1);
            $sql->bindParam(3, $pokemon->tipo2);
            $sql->bindParam(4, $pokemon->habitat);
            $sql->bindParam(5, $pokemon->cor);
            $sql->bindParam(6, $pokemon->evolucao);
            $sql->bindParam(7, $pokemon->altura);
            $sql->bindParam(8, $pokemon->peso);
            $sql->bindParam(9, $pokemon->id);
            $sql->execute();
        }
        public static function excluir($id){
            $con = Conexao::getConexao();
            $sql = $con->prepare("delete from pokemon where id=?");
            $sql->bindParam(1, $id);
            $sql->execute();

        }
        public static function consultar($id){
            $con = Conexao::getConexao();
            $sql = $con->prepare("select * from pokemon where id=?");
            $sql->bindParam(1, $id);
            $sql->execute();

            if($registro = $sql->fetch()){
                return new Pokemon($registro);
            } else {
                return null;
            }

        }
        public static function mostrarTodos($ordem){
            if($ordem==""){
                $ordenacao = "";
            } else if($ordem=="asc"){
                $ordenacao = "order by nome asc";
            } else if($ordem=="desc"){
                $ordenacao = "order by nome desc";
            }

            $con = Conexao::getConexao();
            $sql = $con->prepare("select * from pokemon $ordenacao");
            $sql->execute();

            $pokemonRetorno = [];

            while ($registro = $sql->fetch()){
                $pokemonRetorno[] = new Pokemon($registro);
            } 
            return $pokemonRetorno;
        }
    }

?>