<?php

class Dashboard extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();
        error_log('Dashboard::construct->inicio del dashboard');
        $this->user = $this->getUserSessionData();
    }

    function render(){
        $this->view->render('dashboard/index',['usuario' => $this->user]);
    }

    function salir(){
        $this->logout();
        $this->redirect('',[]);
    }



}


?>