<?php
 class Login extends SessionController{

    function __construct()
    {
        parent::__construct();
      
    }

    function render(){
        error_log("Login::render->Se carga la vista de login");
        $this->view->render('login/index');
    }

    function  authenticate(){
        if($this->existsPOST(['username','password'])){

            $username = $this->getPOST('username');
            $password = $this->getPOST('password');

            if($username == '' || empty($username) || $password == '' || empty($password)){
                $this->redirect('',['error' => ErrorMessages::ERROR_LOGIN_AUTHENTICATE_EMPTY]);
            } else {

            $user = $this->model->login($username,$password);

            if($user != NULL){
                $this->initialize($user);
            }else{
                $this->redirect('',['error' => ErrorMessages::ERROR_LOGIN_AUTHENTICATE_DATA]);
            }
        }
        }else{
            $this->redirect('',['error' => ErrorMessages::ERROR_LOGIN_AUTHENTICATE]);
        }
    }
 }
?>