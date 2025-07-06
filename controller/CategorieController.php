<?php
require_once "./../service/CategorieService.php";
require_once "./../controller/Controller.php";

class CategorieController extends Controller {
    private CategorieService $categorieService;

    public function __construct() {
        parent::__construct();
        $this->categorieService = new CategorieService();
        $this->callAction();
    }

    protected function callAction() {
        $action = $_REQUEST['action'] ?? "list";
        if (method_exists($this, $action)) {
            $this->$action();
        } else {
            echo "Action '$action' introuvable dans le contrôleur.";
        }
    }

    public function list(): void {
        $categories = $this->categorieService->listerCategorie();
        $this->renderView("categorie/list", [
            "categories" => $categories
        ]);
    }

    public function form(): void {
        $this->renderView("categorie/form", []);
    }

    public function create(): void {
        extract($_POST);

        if ($this->validator->isEmpty($libelle, "libelle", "Le libellé est obligatoire")) {
            $_SESSION['data'] = $_POST;
            $_SESSION['erreurs'] = $this->validator->getErreurs();
            header("location:index.php?controller=categorie&action=form");
            exit;
        }

        if ($this->validator->isValid()) {
            $this->categorieService->addCategorie($libelle);
            header("location:index.php?controller=categorie&action=list");
            exit;
        }
    }
}
