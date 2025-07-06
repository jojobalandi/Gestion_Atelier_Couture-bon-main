<?php
require_once "./../service/ArticleConfectionService.php";
require_once "./../service/ArticleVenteService.php";
require_once "./../service/CompteService.php";
require_once "./../model/ArticleConfection.php";
require_once "./../model/ArticleVente.php";
require_once "./../controller/Controller.php";
require_once "./../model/Fournisseur.php";
require_once "./../service/FournisseurService.php";
class FournisseurController extends Controller{
    private FournisseurService $fournisseurService;

    private CompteService $userService;

    public function __construct(){
        parent::__construct();
        $this->fournisseurService = new FournisseurService();
        $this->userService = new CompteService();
        $this->callAction();
    }

    public function callAction(): void
    {
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
                    $this->createFournisseur();
                        break;
            default:
                # code...
                break;
        }
    }

    public function loadForm(): void
    {
        $fournisseurs= $this->fournisseurService->listerFournisseur();
        $this->renderView("article/form",[
            "fournisseurs"=>$fournisseurs
        ]);
    }

    public function createFournisseur(){

            extract($_REQUEST);
             //2-Valider les donnees
            if ($this->validator->isEmpty($categorie,'categorie',"Veuiller  Selectionnez un catégorie")){
                    unset($_POST['categorie']);
            }

            if ($this->validator->isEmpty($libelle,'libelle',"le libellle est obligatoire")){
                    unset($_POST['libelle']);
            }
            
            if ($this->validator->isEmpty($libelle,'qteStock',"Le qteStock est obligatoire") || !$this->validator->isNumber($qteStock,'qteStock',"Le qte Stock superieur doit etre superieur a  0")){
                    unset($_POST['qteStock']);
            }

            if ($this->validator->isValid()) {
                $fournisseur=new Fournisseur();
                $this->fournisseurService->addFournisseur($fournisseur);
            }else{
                $_SESSION['erreurs']= $this->validator->getErreurs();
                $_SESSION['data']= $_POST;

                header("location:index.php?controller=fournisseur&action=form");
                exit;
            }
    

        header("location:index.php?controller=article&action=list");
        exit;
    }




    public function showList(): void
    {

        $id=$_REQUEST['id']??"";
        $currentPage=$_REQUEST['page']??1;
        $clientId=$_SESSION['user']['role']=="Admin"?null:$_SESSION['user']['id'];
        $nbrePage=0;
        if(empty($numero)){
            $fournisseurs=$this->fournisseurService->listerFournisseur($clientId,$currentPage);
            $this->renderView("fournisseur/list", [
                "fournisseurs" => $fournisseurs]);
            $nbrePage=$this->fournisseurService->getNbrePage();
        }else{
            $numero=$_REQUEST['numero'];
            $fournisseur=$this->fournisseurService->searchClientbyId($id);
            $fournisseurs=[];
            if ($fournisseur!=null) {
                $fournisseurs=[$fournisseur];
                $nbrePage=1;
            }
        }
        $data=[
        "fournisseurs"=> $fournisseurs,
        "nbrePage"=> $nbrePage,
        ];
            $this->renderView("fournisseur/list",$data);
    }
}