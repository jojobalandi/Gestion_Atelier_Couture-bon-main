<?php
require_once "./../service/ClientService.php";
require_once "./../service/CompteService.php";
require_once "./../model/Client.php";
require_once "./../controller/Controller.php";

class ClientController extends Controller{
    private ClientService $clientService;
    private CompteService $userService;
    public function __construct(){
        parent::__construct();
        $this->clientService = new ClientService();
        $this->userService = new CompteService();
        $this->callAction();
    }

    public function callAction(){
        if (!isset($_SESSION['user'])) {
            header("location:index.php");
            exit;
        }
        $action =$_REQUEST['action']??"list";//form
        switch ( $action) {
            case 'list':
                $this->showList();
                break;
            case 'form':
                    $this->loadForm();
                    break;
                case 'create':
                    $this->createClient();
                        break;
            default:
                # code...
                break;
        }
    }


    public function showList(): void
    {

        $id=$_REQUEST['id']??"";
        $currentPage=$_REQUEST['page']??1;
        $clientId=$_SESSION['user']['role']=="Admin"?null:$_SESSION['user']['id'];
        $nbrePage=0;
        if(empty($numero)){
            $clients=$this->clientService->listerClient($clientId,$currentPage);
            $nbrePage=$this->clientService->getNbrePage();
        }else{
            $numero=$_REQUEST['numero'];
            $client=$this->clientService->searchClientbyId($id);
            $clients=[];
            if ($client!=null) {
                $clients=[$client];
                $nbrePage=1;
            }
        }
    $data=[
    "clients"=> $clients,
    "nbrePage"=> $nbrePage,
    ];
        $this->renderView("client/list",$data);
    }

    public function loadForm(): void
    {
        $clients= $this->clientService->listerClient();
        $this->renderView("client/form",[
            "clients"=>$clients,
        ]);
    }

    public function createClient(){
             //1-Recuperer les donnees du Formulaire
            extract($_REQUEST);
             //2-Valider les donnees
            if ($this->validator->isEmpty($nom,'nom',"Veuiller   entrer un nom")){
                    unset($_POST['nom']);
            }

            if ($this->validator->isEmpty($prenom,'prenom',"Veuiller   entrer un prenom")){
                    unset($_POST['prenom']);
            }

            if ($this->validator->isEmpty($adresse,'adresse',"Veuiller   entrer un adresse")){
                    unset($_POST['adresse']);
            }

            if ($this->validator->isEmpty($telephone,'telephone',"Veuiller   entrer un numéro")){
                    unset($_POST['telephone']);
            }

            if ($this->validator->isEmpty($observation,'observation',"Veuiller   entrer un numéro")){
                    unset($_POST['observation']);
            }

            if ($this->validator->isValid()) {
                $client=new Client();
                $this->clientService->addClient($client);
            }else{
                $_SESSION['erreurs']= $this->validator->getErreurs();
                $_SESSION['data']= $_POST;

                header("location:index.php?controller=client&action=form");
                exit;
            }
    

        header("location:index.php?controller=client&action=list");
        exit;
    }


}