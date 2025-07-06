<?php
require_once "./../config/Validator.php";

abstract class Controller {

    protected $layout = "base";
    protected Validator $validator;

    protected function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->validator = new Validator();
    }

    protected abstract function callAction();

    protected function renderView(string $viewPath, array $data = []): void {
        extract($data);

        ob_start();
        require __DIR__ . "/../view/{$viewPath}.html.php";
        $view = ob_get_clean();

        // utilise le layout défini dans le contrôleur
        $layoutFile = __DIR__ . "/../view/layout/{$this->layout}.layout.php";
        if (file_exists($layoutFile)) {
            require $layoutFile;
        } else {
            echo "Le layout '{$this->layout}.layout.php' est introuvable.";
        }
    }
}
