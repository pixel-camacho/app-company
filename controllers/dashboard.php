<?php

require_once 'models/multifuncionalmodel.php';

class Dashboard extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();
        error_log('Dashboard::construct->inicio del dashboard');
        $this->user = $this->getUserSessionData();
    }

    function render(){
        
        $multifuncionales = new MultifuncionalModel(); 
        $this->view->render('dashboard/index',['usuario' => $this->user,
                                               'multifuncionales' => $multifuncionales->getAll()]);
    }

    function salir(){
        $this->logout();
        $this->redirect('',[]);
    }

    function eliminarTarjeta(){
    
        if(!$this->existsGET(['id'])){
           //error10
        }

        $id = $this->getGET('id');
        $multifuncional = new MultifuncionalModel();

        if($multifuncional->delete($id)){
            $this->redirect('dashboard',['success' => SuccessMessages::SUCCESS_DASHBOARD_DELETE]);
        }
    }

}


?>