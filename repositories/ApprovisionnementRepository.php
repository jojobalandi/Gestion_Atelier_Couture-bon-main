<?php
require_once "./../config/Database.php";
require_once "./../model/Approvisionnement.php";
class ApprovisionnementRepository{
    private Database $database;

    public function __construct()
    {
        $this->database = new Database;
    }

    public function selectAllApprovisionnement():array{
        $sql="SELECT * FROM `approvisionnement`";
        try {
                $stmt = $this->database->getPdo()->query($sql);
                $approvisionnements=[];
                while ($row = $stmt->fetch()) {
                    $approvisionnements[]=Approvisionnement::toApprovisionnement($row);
                }
                return $approvisionnements;
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  
        return [];
    }

    public function selectApprovisionnementById(String $id):Approvisionnement|null{
        $sql="select * from approvisionnement where id='$id'";
        try {
            $stmt = $this->database->getPdo()->query($sql);
            if($row = $stmt->fetch()){
                return Approvisionnement::toApprovisionnement($row);
            }
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  
        return null;
    }

    

    public function insertApprovisionnement(Approvisionnement $approvisionnement):int{
        $sql= "INSERT INTO `approvisionnement` (`id`, `dateApprovi`, `fournisseur`, `articleConfection`, `qteStock`, `monActuelStock`) VALUES ('".$approvisionnement->getId()."', '".$approvisionnement->getDateApprovi()."', '".$approvisionnement->getFournisseur()."', '".$approvisionnement->getArticleConfection()."', '".$approvisionnement->getQteStock()."', '".$approvisionnement->getMonActuelStock()."');";
        $nbreApprovisionnementInsere =0;
        try {
            $nbreApprovisionnementInsere = $this->database->getPdo()->exec($sql); 
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  

        return  $nbreApprovisionnementInsere;
    }

    public function updateApprovisionnement(Approvisionnement $approvisionnement):int{
        $sql="UPDATE `approvisionnement` SET `telephone` = '77 333 65 74' WHERE `approvisionnement`.`id` = '".$approvisionnement->getId()."';";
        $nbreApprovisionnementUpdate=0;
        try{
            $nbreApprovisionnementUpdate=$this->database->getPdo()->exec($sql);
        } catch (\PDOException $ex) {
            echo("Erreur".$ex->getMessage());
            exit;
        }
        return $nbreApprovisionnementUpdate;
    }

    public function count():int{
        $sql="SELECT count(id) as count FROM `approvisionnement`";
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
        $sql="SELECT id FROM `approvisionnement` ORDER by `id` desc LIMIT 0,1";
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