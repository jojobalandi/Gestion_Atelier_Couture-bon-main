<?php
require_once "Personne.php";
class Client extends Personne{
    private String $observation;
    private  array $ventes=[];
    
    public function __construct() {
        parent::__construct();
    }
    

    public function getObservation()
    {
        return $this->observation;
    }


    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }


    public static function toClient($row):Client{
        $client=new Client();
        $client->setId($row['id']);
        $client->setNom($row['nom']);
        $client->setPrenom($row['prenom']);
        $client->setAdresse($row['adresse']);
        $client->setTelephone($row['telephone']);
        $client->setObservation($row['observation']);
        $client->setPhoto($row['photo']);
        return $client;
    }

    public function getVentes()
    {
        return $this->ventes;
    }


    public function addVente(Vente $vente): void
    {
        $this->ventes[] = $vente;
    }
}