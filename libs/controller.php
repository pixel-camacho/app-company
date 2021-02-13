<?php

class Controller{

    function __construct()
    {
        $this->view = new View();
    }

    function loadModel($model){
        $url = 'models/'.$model.'model.php';

        if(file_exists($url)){
            require_once $url;

            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }

    function existsPOST($params){

        foreach ($params as $param) {
            if(!isset($_POST[$param])){
                error_log('CONTROLLER::existsPost => No existe el parametro');
                return false;
            }
        }
        error_log('CONTROLLER::existsPost => Existe los parametros');
        return true;
    }

    function existsGET($params){

        foreach ($params as $param) {
            if(!isset($_GET[$param])){
                error_log('CONTROLLER::existsGet => No existe el parametro');
                return false;
            }
        }
        return true;
    }

    function getGET($name){
        return $_GET[$name];
    }

    function getPOST($name){
        return $_POST[$name];
    }

    function redirect($route, $mensajes){
        $data = [];
        $params = [];

        foreach ($mensajes as $key => $mensaje) {
            array_push($data,$key. '=' . $mensaje);
        }
        $params = join('&',$data);

        if($params != ''){
            $params = '?' .$params;
        }

        error_log(constant('URL') .'/' .$route . $params);

        header('Location: '.constant('URL') .'/' .$route . $params);
    }
}

?>