<?php
require_once "./../service/CompteService.php";
require_once "./../controller/Controller.php";

class SecurityController extends Controller{
    private CompteService $userService;

    public function __construct(){
        parent::__construct();
        $this->userService = new CompteService();
        $this->layout="connexion";
    }

    public function callAction(){
        $action=$_REQUEST['action'] ?? "form";
        error_log("SecurityController::callAction action = " . $action);
        switch($action){
            case 'form':
                $this->form();
                break;
            case 'login':
                $this->login();
                break;
            case 'logout':
                $this->logout();
                break;
            default:
                $this->form();
                break;
        }
    }

    public function login(){

        $login = $_REQUEST['login'] ?? '';
        $password = $_REQUEST['password'] ?? '';
        $role = $_REQUEST['role'] ?? '';

        $this->validator->isEmpty($login, 'login', "Le nom d'utilisateur est obligatoire");
        $this->validator->isEmpty($password, 'password', "Le mot de passe est obligatoire");
        $this->validator->isEmpty($role, 'role', "Veuillez sélectionner votre rôle");


        if ($this->validator->isValid()) {
            $user = $this->userService->seConnecter($login, $password, $role);

            if ($user == null) {
                $this->validator->addErreur("connexion", "Nom d'utilisateur, Mot de passe ou Rôle incorrect.");
                $_SESSION['erreurs'] = $this->validator->getErreurs();
                $_SESSION['data'] = $_REQUEST;
                header("location:index.php?controller=security&action=form");
                exit;
            }
            $_SESSION['user'] = $user->toArray();
            header("location:index.php?controller=article&action=list");
            exit;
        } else {

            $_SESSION['erreurs'] = $this->validator->getErreurs();
            $_SESSION['data'] = $_REQUEST;
            header("location:index.php?controller=security&action=form");
            exit;
        }
    }

    public function form(){
        $this->layout = "connexion";

        $this->renderView("security/login");
    }

    public function logout(){

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['user'] = array();
        unset($_SESSION['user']);
        session_unset();
        session_destroy();
        header("location:index.php?controller=security&action=form");
        exit;
    }
}