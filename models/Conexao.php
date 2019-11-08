<?php

    class Conexao{

        //vai receber o banco de dados
        private $host = 'mysql:host=localhost;dbname=instagram;port=3307';
        private $user = 'root';
        private $pass = '';

        //garantir que so se conecta no banco quem extender essa classe
        //vai gerar uma conexao
        protected function criarConexao(){
            //fazer um newPDO
            //atributo se usa quem cifrao
            return new PDO($this->host, $this->user, $this->pass);
        }

        

    }


?>