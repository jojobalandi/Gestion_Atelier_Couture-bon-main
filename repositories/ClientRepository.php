<?php
require_once "./../config/Database.php";
require_once "./../model/Client.php";
class ClientRepository{
    private Database $database;

    public function __construct()
    {
        $this->database = new Database;
    }

    public function selectAllClient():array{
        $sql="SELECT * FROM `client`";
        try {
                $stmt = $this->database->getPdo()->query($sql);
                $clients=[];
                while ($row = $stmt->fetch()) {
                    $clients[]=Client::toClient($row);
                }
                return $clients;
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  
        return [];
    }

    public function selectClientById(String $id):Client|null{
        $sql="select * from client where id='$id'";
        try {
            $stmt = $this->database->getPdo()->query($sql);
            if($row = $stmt->fetch()){
                return Client::toClient($row);
            }
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  
        return null;
    }

    public function insertClient(Client $client):int{
        $sql= "INSERT INTO `client` (`id`, `nom`, `prenom`, `adresse`, `telephone`, `observation`, `photo`) VALUES ('".$client->getId()."', '".$client->getNom()."', '".$client->getPrenom()."', '".$client->getAdresse()."', '".$client->getTelephone()."', '".$client->getObservation()."', NULL);";
        $nbreClientInsere =0;
        try {
            $nbreClientInsere = $this->database->getPdo()->exec($sql); 
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  

        return  $nbreClientInsere;
    }

    //pas fini
    public function updateClient(Client $client):int{
        $sql="UPDATE `client` SET `telephone` = '77 333 65 74' WHERE `client`.`id` = '".$client->getId()."';";
        $nbreClientUpdate=0;
        try{
            $nbreClientUpdate=$this->database->getPdo()->exec($sql);
        } catch (\PDOException $ex) {
            echo("Erreur".$ex->getMessage());
            exit;
        }
        return $nbreClientUpdate;
    }

    public function count():int{
        $sql="SELECT count(id) as count FROM `client`";
        try {
            $stmt = $this->database->getPdo()->query($sql);
            if($row = $stmt->fetch()){
            return $row["count"];
            }
        } catch (\PDOException $ex) {
                echo("Erreur ".$ex->getMessage());
                exit;
        }  
        return 0;
    }


    public function selectLastInsertId():int{
        $sql="SELECT id FROM `client` ORDER by `id` desc LIMIT 0,1";
        try {
            $stmt = $this->database->getPdo()->query($sql);
            if($row = $stmt->fetch()){
            return $row["id"];
            }       
        } catch (\PDOException $ex) {
                echo("Erreur ".$ex->getMessage());
                exit;
        }  
        return 0;
    }


}