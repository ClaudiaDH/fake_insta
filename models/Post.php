<?php
    include_once "Conexao.php";
    class Post extends Conexao{

        public function criarPost($image, $descricao){
            //acessando uma classe pai
            $db = parent::criarConexao();

            $query = $db->prepare("INSERT INTO posts (img, descricao) values(?,?)");
            return $query->execute([$image, $descricao]);
        }

    }


?>