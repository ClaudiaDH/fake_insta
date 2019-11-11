<?php
    include_once "Conexao.php";
    class Post extends Conexao{

        public function criarPost($image, $descricao){
            //acessando uma classe pai
            //a funcao que ele vai usar é do pai dele.
            $db = parent::criarConexao();

            $query = $db->prepare("INSERT INTO posts (img, descricao) values(?,?)");
            return $query->execute([$image, $descricao]);
        }

        //metodo que vai no banco , pega todos os posts e leva para o controller usar
        public function listarPosts(){
            //poder conectar com o banco de dados
            $db = parent::criarConexao();
            //pegar todas as info cadastrados na tabela posts.
            //usei query porque é uma query fixa, não depende de nada que o meu usario digitar.
            $query = $db->query('SELECT * FROM posts order by id DESC');
            //traduz tudo que receber para algum formato que o php entenda.
            //fetch_obj : retorna uma lista de objetos.
            //colocado para poder ver comom é o funcionamento.
            $resultado = $query->fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        }

       


    }


?>