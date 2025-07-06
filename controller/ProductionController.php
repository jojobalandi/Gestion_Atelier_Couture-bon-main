<?php
require_once __DIR__ . '/../controller/Controller.php';
require_once __DIR__ . '/../service/ProductionService.php';
require_once __DIR__ . '/../service/ArticleVenteService.php';
require_once __DIR__ . '/../model/Production.php';

class ProductionController extends Controller
{
    private ProductionService $productionService;
    private ArticleVenteService $articleService;

    public function __construct()
    {
        parent::__construct();
        $this->productionService = new ProductionService();
        $this->articleService    = new ArticleVenteService();
        $this->callAction();
    }

    protected function callAction(): void
    {
        $action = $_REQUEST['action'] ?? 'list';
        if (method_exists($this, $action)) {
            $this->$action();
        } else {
            echo "Action '$action' introuvable dans ProductionController.";
        }
    }


    public function list(): void
    {
        $productions = $this->productionService->listerProductions();
        $this->renderView("production/list", [
            'productions' => $productions
        ]);
    }

    /** Formulaire d’ajout */
    public function form(): void
    {
        $articles = $this->articleService->listerArticlesVente();
        $this->renderView("production/form", [
            'articles' => $articles
        ]);
    }


    public function create(): void
    {
        extract($_POST);

        // Validation
        $this->validator->isEmpty($article,   'article',   "Article requis");
        $this->validator->isEmpty($quantite,  'quantite',  "Quantité requise");
        if (!$this->validator->isNumber($quantite, 'quantite', "La quantité doit être numérique")) {
            unset($_POST['quantite']);
        }

        if (!$this->validator->isValid()) {
            $_SESSION['erreurs'] = $this->validator->getErreurs();
            $_SESSION['data']    = $_POST;
            header("Location: index.php?controller=production&action=form");
            exit;
        }


        $prod = new Production();
        $prod->setArticleId($article);
        $prod->setQuantite($quantite);
        $prod->setObservation($observation ?? '');
        $prod->setDateProd(date('Y-m-d'));

        $this->productionService->enregistrerProduction($prod);

        header("Location: index.php?controller=production&action=list");
        exit;
    }
}
