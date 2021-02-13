<?php

require_once 'controllers/errores.php';

class App{

    function __construct()
    {
       
       /*$url = isset($_GET['url']) ? $_GET['url']: null;
        $url = rtrim($url,'/');
        $url = explode('/',$url);*/
     
        $url = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : null;
        $url = explode('/',$url);


        if(empty($url[2])){
            error_log('APP::contruct-> no hay controlador especificado');
            $archivoController = 'controllers/login.php';
            require $archivoController;
            $controller = new Login();
            $controller->loadModel('login');
            $controller->render();
            return false;
        }

        $archivoController = 'controllers/'.$url[2].'.php';

        if(file_exists($archivoController)){
              
            require_once $archivoController;
            $controller = new $url[2];
            $controller->loadModel($url[2]);

            if(isset($url[3])){
                if(method_exists($controller, $url[3])){
                    if(isset($url[4])){
                        //numero de parametros
                        $nparam = count($url) - 2;
                        // atteglo de parametros
                        $params = [];

                        for($i = 0; $i < $nparam; $i++){
                            array_push($params,$url[$i] +2);
                        }
                           $controller->{$url[1]}($params);
                    }else{
                        // no tiene parametros, se manda a llamar
                        //el metodo tal caul
                        $controller->{$url[3]}();
                    }
                }else{
                    //error, no esiste el metodo
                    $controller = new Errores();
                    $controller->render();
                }
            }else{
               // no hay metodo a cargar, se carga el metodo por default
               $controller->render();
            }
        }else{
            // no existe el archivo, manda error
            $controller = new Errores();
            $controller->render();
        }

    }
}

?>