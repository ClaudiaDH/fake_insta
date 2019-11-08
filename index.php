<?php

    //pegar o que o usuario digitou na URL
    $rotas = key($_GET)?key($_GET):"posts";
    
    //validacao para saber qual controller eu chamo:
    switch ($rotas) {
        //caso ele digite post, mando ele para o controller
        case "posts":  
            include "controllers/PostController.php";
            //Criando um Objeto
            $controller =  new PostController();  
            //acessando um metodo do objeto
            $controller->acao($rotas);            
        break;
        //caso ele digitei o formulario-post eu mando ele pra o mesmo controller que tem o cadastro do post
        case "formulario-post":
           include "controllers/PostController.php";
           $controller =  new PostController();  
           //acessando um metodo do objeto
           $controller->acao($rotas); 
        break;

        case "cadastrar-post":
            include "controllers/PostController.php";
            $controller =  new PostController();  
            //acessando um metodo do objeto
            $controller->acao($rotas); 
        break;
    }





?>