<?php
    include_once "models/Post.php";
    class PostController {
        //necessario que esta classe tenha o metodo acao
        public function acao($rotas){
            //qual ação vai tomar mediante ao que o usuario digitou
            switch ($rotas) {
                case "posts":
                    $this->viewPost();
                break;
                
                case "formulario-post":
                    $this->viewFormularioPost();
                break;
                case "cadastrar-post":
                    $this->cadastrarPost();
                break;

                
            }
        }

        //vai retornar uma view
        private function viewFormularioPost(){
            include "views/newPost.php";
        }
        private function viewPost(){
            include "views/posts.php";
        }
        private function cadastrarPost(){
            //desmembrar as info para poder trabalhar com ela
            $descricao = $_POST['descricao'];
            //dizer qual input quero pegar e as info
            $nomeArquivo = $_FILES['img']['name'];
            $linkTemp = $_FILES['img']['tmp_name'];
            $caminhoSalvar = "views/img/$nomeArquivo";

            move_uploaded_file($linkTemp, $caminhoSalvar);

            //para ter acesso as info crio um Obj
            $post = new Post();
            $resultado = $post->criarPost($caminhoSalvar, $descricao);

            if($resultado){
                header('Location:/fake_insta/posts');
            }
        }

    }



?>