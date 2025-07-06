<?php
require_once "./../service/CompteService.php";
require_once "./../service/ApprovisionnementService.php";
require_once "./../service/ArticleConfectionService.php";
require_once "./../service/FournisseurService.php";
require_once "./../model/Approvisionnement.php";
require_once "./../controller/Controller.php";

class ApprovisionnementController extends Controller{

    private ApprovisionnementService $approvisionnementService;
    private ArticleConfectionService  $articleConfectionService;
    private FournisseurService $fournisseurService;
    private CompteService $userService;

    public function __construct(){
        parent::__construct();
        $this->approvisionnementService = new ApprovisionnementService();
        $this->articleConfectionService = new ArticleConfectionService();
        $this->fournisseurService = new FournisseurService();
        $this->userService = new CompteService();

    }

    public function callAction(){
        if (!isset($_SESSION['user'])) {
            header("location:index.php");
            exit;
        }
        $action =$_REQUEST['action']??"list";
        switch ( $action) {
            case 'list':
                $this->showList();
                break;
            case 'form':
                $this->loadForm();
                break;
            case 'create':
                $this->createApprovisionnement();
                break;
            default:

                header("location:index.php?controller=approvisionnement&action=list");
                exit;
        }
    }


    public function showList(): void
    {
        $id=$_REQUEST['id']??"";
        $currentPage=$_REQUEST['page']??1;

        $clientId=$_SESSION['user']['role']=="Admin"?null:$_SESSION['user']['id'];
        $nbrePage=0;


        if(empty($id)){
            $approvisionnements=$this->approvisionnementService->listerApprovisionnement($clientId,$currentPage);
            $nbrePage=$this->approvisionnementService->getNbrePage();
        }else{

            $approvisionnement=$this->approvisionnementService->searchApprovisionnementbyId($id);
            $approvisionnements=[];
            if ($approvisionnement!=null) {
                $approvisionnements=[$approvisionnement];
                $nbrePage=1;
            }
        }
        $data=[
            "approvisionnements"=> $approvisionnements,
            "nbrePage"=> $nbrePage,

        ];
        $this->renderView("approvisionnement/list",$data);
    }

    public function loadForm(): void
    {


        $fournisseurs = $this->fournisseurService->listerFournisseur();
        $articleConfections = $this->articleConfectionService->listerArticleConfection();

        $this->renderView("approvisionnement/form",[

            "articleConfections" => $articleConfections,
            "fournisseurs" => $fournisseurs
        ]);
    }

    public function createApprovisionnement(){

        extract($_REQUEST);

        $fournisseurId = $_POST['fournisseur'] ?? '';
        $qteStock = $_POST['qteStock'] ?? '';
        $articleConfectionId = $_POST['articleConfection'] ?? '';


        if ($this->validator->isEmpty($fournisseurId, 'fournisseur', "Veuiller selectionner le fournisseur de l'approvisionnement")) {
        }

        if ($this->validator->isEmpty($qteStock, 'qteStock', "La quantité d'approvisionnement est obligatoire") || !$this->validator->isNumber($qteStock, 'qteStock', "La quantité doit être un nombre supérieur à 0")) {

        }

        if ($this->validator->isEmpty($articleConfectionId, 'articleConfection', "Veuiller selectionner un article de confection")) {

        }


        if ($this->validator->isValid()) {

            $articleConfectionObj = $this->articleConfectionService->searchArticleConfectionbyId($articleConfectionId);

            if ($articleConfectionObj) {
                $newQteStock = $articleConfectionObj->getQteStock() + $qteStock;
                $articleConfectionObj->setQteStock($newQteStock);
                $this->articleConfectionService->updateArticleConfection($articleConfectionObj);

                $montActuelStock = $articleConfectionObj->getPrixAchat() * $articleConfectionObj->getQteStock();

                $approvisionnement = new Approvisionnement();

                $approvisionnement->setArticleConfection($articleConfectionId); // Passez l'ID
                $approvisionnement->setFournisseur($fournisseurId); // Passez l'ID
                $approvisionnement->setQteStock($qteStock);
                $approvisionnement->setMonActuelStock($montActuelStock);
                $dateAppro = date('Y-m-d');
                $approvisionnement->setDateApprovi($dateAppro);

                $this->approvisionnementService->addApprovisionnement($approvisionnement);
                header("location:index.php?controller=approvisionnement&action=list");
                exit;
            } else {

                $_SESSION['erreurs']['articleConfection'] = "L'article de confection sélectionné est introuvable.";
                $_SESSION['data'] = $_POST;
                header("location:index.php?controller=approvisionnement&action=form");
                exit;
            }
        } else {

            $_SESSION['erreurs'] = $this->validator->getErreurs();
            $_SESSION['data'] = $_POST;

            header("location:index.php?controller=approvisionnement&action=form");
            exit;
        }
    }
}