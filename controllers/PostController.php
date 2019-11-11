<?php
    include_once "models/Post.php";
    class PostController {
        //necessario que esta classe tenha o metodo acao
        public function acao($rotas){
            //qual ação vai tomar mediante ao que o usuario digitou
            switch ($rotas) {
                case "posts":
                    $this->listarPosts();        //viewPost();
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
            //pega o nome do arquivo
            $nomeArquivo = $_FILES['img']['name'];
            //pega o link temp da onde esta localizado a imagem
            $linkTemp = $_FILES['img']['tmp_name'];
            $caminhoSalvar = "views/img/$nomeArquivo";

            move_uploaded_file($linkTemp, $caminhoSalvar);

            //para ter acesso as info crio um Obj
            $post = new Post();
            $resultado = $post->criarPost($caminhoSalvar, $descricao);

            if($resultado){
                header('Location:/fake_insta/posts');
            }else{
                echo "deu errado !";
            }
        }

        //pego a lista que recebo do meu model e por meio do controller passar isso
        //cria o obj to tipo post
        private function listarPosts(){
            $post = new Post();
            $listaPosts = $post->listarPosts();
            //pego a lista de post e coloco dentro do request chamado post
            //a view e um arquivo php, que tem acesso a qualquer global
            //pq na hora que ela chamar a viu, na hora que ela aparecer ela tera acesso as info do request
            $_REQUEST['posts'] = $listaPosts;
            //vai fazer meio que um include.
            //retorna uma view.
            $this->viewPost();
            //mesmo que include "views/posts.php";
        }

    }



?>