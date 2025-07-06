<?php

require_once __DIR__ . "/../controller/Controller.php";
require_once __DIR__ . "/../service/VenteService.php";
require_once __DIR__ . "/../service/ArticleVenteService.php";
require_once __DIR__ . "/../service/ClientService.php";
require_once __DIR__ . "/../model/Vente.php";

class VenteController extends Controller {
    private VenteService $venteService;
    private ArticleVenteService $articleVenteService;
    private ClientService $clientService;

    public function __construct() {
        parent::__construct();
        $this->venteService = new VenteService();
        $this->articleVenteService = new ArticleVenteService();
        $this->clientService = new ClientService();
        $this->callAction();
    }

    public function callAction(): void {
        $action = $_REQUEST['action'] ?? "list";
        if (method_exists($this, $action)) {
            $this->$action();
        } else {
            echo "Action '$action' introuvable dans le contrôleur Vente.";
        }
    }

    public function list(): void {
        $ventes = $this->venteService->listerVente();
        $this->renderView("vente/list", [
            "ventes" => $ventes
        ]);
    }

    public function form(): void {

        $articles = $this->articleVenteService->listerArticleVente();
        $clients = $this->clientService->listerClient();

        echo "<pre>DEBUG: Contenu de \$articles (dans VenteController):<br>";
        var_dump($articles);
        echo "</pre>";

        echo "<pre>DEBUG: Contenu de \$clients (dans VenteController):<br>";
        var_dump($clients);
        echo "</pre>";


        $this->renderView("vente/form", [
            "articles" => $articles,
            "clients" => $clients
        ]);
    }

    public function create(): void {
        extract($_POST);

        if ($this->validator->isEmpty($client, 'client', "Le client est requis")) {
            unset($_POST['client']);
        }
        if ($this->validator->isEmpty($article, 'article', "L'article est requis")) {
            unset($_POST['article']);
        }
        if ($this->validator->isEmpty($quantite, 'quantite', "La quantité est requise") ||
            !$this->validator->isNumber($quantite, 'quantite', "La quantité doit être un nombre")) {
            unset($_POST['quantite']);
        }

        if ($this->validator->isValid()) {
            $vente = new Vente();

            $vente->setClientId($client);
            $vente->setArticleId($article);
            $vente->setQteVendue($quantite);
            $vente->setDateVente(new DateTime());

            $this->venteService->enregistrerVente($vente);

            header("location:" . BASE_URL . "public/index.php?controller=vente&action=list");
            exit;
        } else {
            $_SESSION['erreurs'] = $this->validator->getErreurs();
            $_SESSION['data'] = $_POST;
            header("location:" . BASE_URL . "public/index.php?controller=vente&action=form");
            exit;
        }
    }
}