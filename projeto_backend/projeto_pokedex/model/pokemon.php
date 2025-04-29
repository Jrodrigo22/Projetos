<?php

    class Pokemon{
        public $id;
        public $nome;
        public $tipo1;
        public $tipo2;
        public $habitat;
        public $cor;
        public $evolucao;
        public $altura;
        public $peso;

        public function __construct($arrayPokemon)
        {
            if(array_keys($arrayPokemon) != range(0, count($arrayPokemon) - 1)){
                $this->id = $arrayPokemon["ID"];
                $this->nome = $arrayPokemon["NOME"];
                $this->tipo1 = $arrayPokemon["TIPO_1"];
                $this->tipo2 = $arrayPokemon["TIPO_2"];
                $this->habitat = $arrayPokemon["HABITAT"];
                $this->cor = $arrayPokemon["COR"];
                $this->evolucao = $arrayPokemon["EVOLUCAO"];
                $this->altura = $arrayPokemon["ALTURA"];
                $this->peso = $arrayPokemon["PESO"];
            } else{
                $this->id = $arrayPokemon[0];
                $this->nome = $arrayPokemon[1];
                $this->tipo1 = $arrayPokemon[2];
                $this->tipo2 = $arrayPokemon[3];
                $this->habitat = $arrayPokemon[4];
                $this->cor = $arrayPokemon[5];
                $this->evolucao = $arrayPokemon[6];
                $this->altura = $arrayPokemon[7];
                $this->peso = $arrayPokemon[8];
            }
        }
    }


?>