<?php
require_once "../service/CompteService.php";
require_once "../controller/Controller.php";

class CompteController extends Controller {
    private CompteService $compteService;

    public function __construct() {
        parent::__construct();
        $this->compteService = new CompteService();
        $this->callAction();
    }

    public function callAction(): void
    {
        $action = $_REQUEST['action'] ?? 'list';

        if (method_exists($this, $action)) {
            $this->$action();
        } else {
            echo "Action '$action' introuvable dans le contrôleur Compte.";
        }
    }

    public function list() {
        $comptes = $this->compteService->listeVendeur();
        $this->renderView("compte/list", [
            "comptes" => $comptes
        ]);
    }

    public function form() {
        $this->renderView("compte/form", []);
    }
}
