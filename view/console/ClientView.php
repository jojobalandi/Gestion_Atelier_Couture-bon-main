<?php
require_once "../../model/Client.php";
class ClientView{
    private ClientService $clientService;
    public function __construct(){
        $this->clientService = new ClientService();
    }

    public static function  saisitClient():Client{
        $client=new Client();
        $client->setId(readline("Vueillez entrer l'id: "));
        $client->setNom(readline("Vueillez entrer le nom: "));
        $client->setPrenom(readline("Vueillez entrer le prenom: "));
        $client->setTelephone(readline("Vueillez entrer le telephone: "));
        $client->setObservation(readline("Vueillez entrer votre observation: "));
        $client->setAdresse(readline("Vueillez entrer votre adresse: "));
        return $client;
    }
    public static function afficheClient(array $clients):void{
        foreach($clients as $client){
            echo "ID: {$client->getId()}, Nom: {$client->getNom()}, Prénom: {$client->getPrenom()}, Téléphone: {$client->getTelephone()}, Observation: {$client->getObservation()}\n";
        }
    }

}