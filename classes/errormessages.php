<?php

class ErrorMessages{
   // ERROR_CONTROLLER_METHOD_ACTION
    const PRUEBA = "3c3d1cc155ef8d6c4950db8d629087sn54hh";
    const ERROR_SIGNUP_NEWUSER = "3c3d1cc155edsf56gdfg4fg89gw234"; 
    const ERROR_SIGNUP_NEWUSER_EMPTY = "vb0987mp03d1cc155edsf56gdfg4fg456d4b";
    const ERROR_SIGNUP_NEWUSER_EXISTS = "hkj456kjh6g9d1cctry67f5edsf56gdfg4fgcd";
    const ERROR_LOGIN_AUTHENTICATE_EMPTY = "7875jkd564n090g9d1cctry67f56gdfg48967busfd";
    const ERROR_LOGIN_AUTHENTICATE_DATA = "546846jkdhsd1cctry67f56gdfh47cndv59gdpahj09y";
    const ERROR_LOGIN_AUTHENTICATE = "lk54oipfhh5f56gdfh47cndvnl5498asvnbwef84vj";
   
    
    private $errorList = [];

    public function __construct(){
        $this->errorList = [
            ErrorMessages::PRUEBA => 'ESTE ES UN MENSAJE DE ERROR',
            ErrorMessages::ERROR_SIGNUP_NEWUSER => 'Hubo un error al intentar procesar la solicitud',
            ErrorMessages::ERROR_SIGNUP_NEWUSER_EMPTY => 'Llenar los campos de usuario y password',
            ErrorMessages::ERROR_SIGNUP_NEWUSER_EXISTS => 'Ya existe ese nombre de usuario, escoge otro',
            ErrorMessages::ERROR_LOGIN_AUTHENTICATE_EMPTY => 'Llenar los campos de usuario y password',
            ErrorMessages::ERROR_LOGIN_AUTHENTICATE_DATA => 'Nombre de usuario y/o password incorrecto',
            ErrorMessages::ERROR_LOGIN_AUTHENTICATE => 'No se puede procesar la solicitud. Ingresa usuario y password'
        ];
    }

    public function get($hash){
        return $this->errorList[$hash];
    }

    public function existsKey($key){
        if (array_key_exists($key,$this->errorList)) {
            return true;
        }else {
            return false;
        }
    }

}

?>