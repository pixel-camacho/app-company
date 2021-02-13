<?php
 
 require_once 'classes/session.php';
 require_once 'models/usermodel.php';
 
 class SessionController extends Controller{

    private $userSession;
    private $username;
    private $userid;

    private $defaultSites;
    private $session;
    private $sites;
    private $user;

     function __construct(){
         parent::__construct();
         $this->init();
    }

    function init(){
        $this->session = new Session();
        $json = $this->getJSONFileConfig();

        $this->sites = $json['sites'];
        $this->defaultSites = $json['default-sites'];

        $this->validateSession();
    }

    private function getJSONFileConfig(){
        $string = file_get_contents('./config/access.json');
        $json   = json_decode($string, true);

        return $json;
    }

    public function validateSession(){
        error_log('SESSIONCONTROLLER::validateSession1->'.$this->sites[0]['access']);
          //si existe la sesion
        if($this->existsSession()){

            $role = $this->getUserSessionData()->getRole();
            error_log('SESSIONCONTROLLER::validateSession2->'.$this->getUserSessionData()->getRole());

            //pagina a entrar es publica
            if($this->isPublic()){

               $this->redirectDefaultSiteByRole($role);

            }else{
                if($this->isAuthorizend($role)){
                    // lo dejo pasar
                }else{
                    $this->redirectDefaultSiteByRole($role);
                }
            }
        }else{
            //no existe la sesion
            if($this->isPublic()){
                //lo dejo entrar
            }else{
                header('Location: '.constant('URL'). '');
            }
        }
    }

    function existsSession(){
        if(! $this->session->exists()) return false;
        if($this->session->getCurrentUser() == NULL) return false;

        $userid = $this->session->getCurrentUser();

        error_log('SESSIONCONTROLLER::existsSession->'.$userid);

        if($userid) return true;

        return false;
    }

    function getUserSessionData(){
        $id = $this->session->getCurrentUser();

        $this->user = new UserModel();
        $this->user->get($id);
         error_log('SESSIONCONTROLLER::getUserSessionData-> '.$this->user->getUsername());

        return $this->user;
    }

    function isPublic(){
        $currenrURL = $this->getCurrentPage();
        $currenrURL = preg_replace("/\?.*/","",$currenrURL);

       for($i = 0; $i < sizeof($this->sites); $i++){
            if($currenrURL == $this->sites[$i]['site'] && $this->sites[$i]['access'] == 'public'){
                return true;
            }
        }

        return false;
    }

    function getCurrentPage(){
        $actualLink = trim($_SERVER['PHP_SELF']);
        $url = explode('/',$actualLink);
        error_log('SESSIONCONTROLLER::getCurrentPage -> '. $url[2]);
        return $url[2];
    }

    function redirectDefaultSiteByRole($role){
        $url = '';

        for($i = 0; $i < sizeof($this->sites); $i++){
            if($this->sites[$i]['role'] == $role){
                $url = '/index.php/'.$this->sites[$i]['site']; 
                error_log('SESSIONCONTROLLER::redirectDefaultSiteByRole-> Url = '.$url);
                break;
            }
        }
        header('Location:' .$url);
    }

    private function isAuthorizend($role){

        $currenrURL = $this->getCurrentPage();
        $currenrURL = preg_replace("/\?.*/","",$currenrURL);

        for($i = 0; $i < sizeof($this->sites); $i++){
            if($currenrURL == $this->sites[$i]['site'] && $this->sites[$i]['role'] == $role){
                return true;
            }
        }
        return false;
    }

    function initialize($user){
        $this->session->setCurrentUser($user->getId());
        $this->authorizeAccess($user->getRole());
    }

    function authorizeAccess($role){
        switch($role){
            case 'user':
              $this->redirect($this->defaultSites['user'],[]);
            break;
            case 'admin':
              $this->redirect($this->defaultSites['admin'],[]);
            break;

        }
    } 

    function logout(){
        $this->session->closeSession();
    }
 }

?>