<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start(); // N'oublie pas de démarrer la session


define('BASE_URL', '/Gestion_Atelier_Couture-bon-main/');


$controllerName = $_REQUEST['controller'] ?? "security";
$controller = null;


switch ($controllerName) {
    case 'security':
        require_once "../controller/SecurityController.php";
        $controller = new SecurityController();
        break;
    case 'client':
        require_once "../controller/ClientController.php";
        $controller = new ClientController();
        break;
    case 'approvisionnement':
        require_once "../controller/ApprovisionnementController.php";
        $controller = new ApprovisionnementController();
        break;
    case 'article':
        require_once "../controller/ArticleController.php";
        $controller = new ArticleController();
        break;
    case 'compte':
        require_once "../controller/CompteController.php";
        $controller = new CompteController();
        break;
    case 'categorie':
        require_once "../controller/CategorieController.php";
        $controller = new CategorieController();
        break;
    case 'production':
        require_once "../controller/ProductionController.php";
        $controller = new ProductionController();
        break;
    case 'fournisseur':
        require_once "../controller/FournisseurController.php";
        $controller = new FournisseurController();
        break;
    case 'vente':
        require_once "../controller/VenteController.php";
        $controller = new VenteController();
        break;
    default:
        die("Contrôleur '$controllerName' introuvable.");
}

if ($controller !== null && method_exists($controller, 'callAction')) {
    $controller->callAction();
} else {
    echo "Méthode callAction() introuvable dans le contrôleur **$controllerName**.";
}
?>