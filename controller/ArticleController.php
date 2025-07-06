<?php
require_once "./../service/ArticleConfectionService.php";
require_once "./../service/ArticleVenteService.php";
require_once "./../service/CompteService.php";
require_once "./../service/CategorieService.php";
require_once "./../model/ArticleConfection.php";
require_once "./../model/ArticleVente.php";
require_once "./../controller/Controller.php";

class ArticleController extends Controller {
    private ArticleConfectionService $articleConfectionService;
    private ArticleVenteService $articleVenteService;
    private CompteService $userService;

    public function __construct() {
        parent::__construct();
        $this->articleConfectionService = new ArticleConfectionService();
        $this->articleVenteService = new ArticleVenteService();
        $this->userService = new CompteService();
        $this->callAction();
    }

    protected function callAction(): void
    {
        $action = $_REQUEST['action'] ?? "list";
        if (method_exists($this, $action)) {
            $this->$action();
        } else {
            echo "Action '$action' introuvable dans le contrôleur.";
        }
    }

    public function list(): void {
        $currentPage = $_REQUEST['page'] ?? 1;
        $clientId = $_SESSION['user']['role'] === "Admin" ? null : $_SESSION['user']['id'];

        $articleConfections = $this->articleConfectionService->listerArticleConfection($clientId, $currentPage);
        $nbrePage = $this->articleConfectionService->getNbrePage();

        $this->renderView("article/list", [
            "articleConfections" => $articleConfections,
            "nbrePage" => $nbrePage
        ]);
    }

    public function form(): void {
        $categorieService = new CategorieService();
        $categories = $categorieService->listerCategorie();
        $articleConfections = $this->articleConfectionService->listerArticleConfection();

        $this->renderView("article/form", [
            "articleConfections" => $articleConfections,
            "categories" => $categories
        ]);
    }

    public function create(): void {
        extract($_POST);

        if ($this->validator->isEmpty($categorie, 'categorie', "Veuillez sélectionner une catégorie")) {
            unset($_POST['categorie']);
        }

        if ($this->validator->isEmpty($libelle, 'libelle', "Le libellé est obligatoire")) {
            unset($_POST['libelle']);
        }

        if ($this->validator->isEmpty($qteStock, 'qteStock', "La quantité en stock est obligatoire") ||
            !$this->validator->isNumber($qteStock, 'qteStock', "Le stock doit être un nombre supérieur à 0")) {
            unset($_POST['qteStock']);
        }

        if ($this->validator->isValid()) {
            $montant = $prixAchat * $qteStock;
            $articleConfection = new ArticleConfection();
            $articleConfection->setLibelle($libelle);
            $articleConfection->setQteStock($qteStock);
            $articleConfection->setPrixAchat($prixAchat);
            $articleConfection->setMontStock($montant);
            $articleConfection->setCategorie($categorie);
            $articleConfection->setQteAchat($qteStock);

            $this->articleConfectionService->addArticleConfection($articleConfection);

            header("Location: index.php?controller=article&action=list");
            exit;
        } else {
            $_SESSION['erreurs'] = $this->validator->getErreurs();
            $_SESSION['data'] = $_POST;

            header("Location: index.php?controller=article&action=form");
            exit;
        }
    }
}
