<?php

class SuccessMessages{

    const PRUEBA = "3c3d1cc155ef8d6c4950db8d629a71cd";
    const SUCCESS_SIGNUP_NEWUSER = '5897SDFDGcc1JFGHf8d6c4950db8d6256ibvf';
   
    private $successList = [];
    
    public function __construct(){

        $this->successList = [
            SuccessMessages::PRUEBA => 'ESTE ES UN MENSAJE DE EXITO',
            SuccessMessages::SUCCESS_SIGNUP_NEWUSER => 'Nuevo usuario registrado correctamente'
        ];
        
    }

    public function get($hash){
        return $this->successList[$hash];
    }

    public function existsKey($key){
        if (array_key_exists($key,$this->successList)) {
            return true;
        }else {
            return false;
        }
    }
    
}

?>