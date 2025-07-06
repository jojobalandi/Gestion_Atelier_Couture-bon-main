<?php

require_once "view/ClientView.php";
require_once "service/ClientService.php";

class App {
    public static function main(): void {
        $clientService = new ClientService();
        do {
            $choix = self::menu();
            switch ($choix) {
                case '1':
                    $client = ClientView::saisitClient();
                    if ($clientService->searchClientbyId($client->getId()) == null) {
                        $clientService->addClient($client);
                    } else {
                        echo "Le numero existe deja\n";
                    }
                    break;
                case '2':
                    ClientView::afficheClient($clientService->listerClient());
                    break;
                default:
                    break;
            }
        } while ($choix != '3');
    }

    public static function menu(): string {
        print("1-Creer un Client\n");
        print("2-Lister les Clients\n");
        print("3-Quitter\n");
        return readline("Veuillez faire un choix : ");
    }
}

// Appel de la méthode principale
App::main();
