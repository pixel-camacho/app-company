<?php

require_once 'models/usermodel.php';

class Signup extends SessionController{

    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render('login/signup', []);
    }

    function newUser(){

        if($this->existsPOST(['username','password'])){

            $username = $this->getPOST('username');
            $password = $this->getPOST('password');

            if($username == '' || empty($username) || $password == '' || empty($password)){
                $this->redirect('signup',['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER_EMPTY]);
            }else {

                $user = new UserModel();
                $user->setUsername($username);
                $user->setPassword($password);
                $user->setRole('user');

                if($user->exists($username)){

                    $this->redirect('signup',['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER_EXISTS]);

                }else if($user->save()){

                    $this->redirect('',['success' => SuccessMessages::SUCCESS_SIGNUP_NEWUSER]);
                }else {
                    $this->redirect('signup',['error'=> ErrorMessages::ERROR_SIGNUP_NEWUSER]);  
                }
            }
        }else {
            $this->redirect('signup',['error'=> ErrorMessages::ERROR_SIGNUP_NEWUSER]);
        }
    }

}

?>