<?php
require_once "./../config/Database.php";
require_once "./../model/Fournisseur.php";
class FournisseurRepository{
    private Database $database;

    public function __construct()
    {
        $this->database = new Database;
    }

    public function selectAllFournisseur():array{
        $sql="SELECT * FROM `fournisseur`";
        try {
                $stmt = $this->database->getPdo()->query($sql);
                $fournisseurs=[];
                while ($row = $stmt->fetch()) {
                    $fournisseurs[]=Fournisseur::toFournisseur($row);
                }
                return $fournisseurs;
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  
        return [];
    }

    public function selectFournisseurById(String $id):Fournisseur|null{
        $sql="select * from fournisseur where id='$id'";
        try {
            $stmt = $this->database->getPdo()->query($sql);
            if($row = $stmt->fetch()){
                return Fournisseur::toFournisseur($row);
            }
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  
        return null;
    }

    public function insertFournisseur(Fournisseur $fournisseur):int{
        $sql= "INSERT INTO `fournisseur` (`id`, `nom`, `prenom`, `adresse`, `telephone`, `telFixe`, `photo`) VALUES ('".$fournisseur->getId()."', '".$fournisseur->getNom()."', '".$fournisseur->getPrenom()."', '".$fournisseur->getAdresse()."', '".$fournisseur->getTelephone()."', '".$fournisseur->getTelFixe()."', NULL);";
        $nbreFounisseurInsere =0;
        try {
            $nbreFounisseurInsere = $this->database->getPdo()->exec($sql); 
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  

        return  $nbreFounisseurInsere;
    }

    public function updateFournisseur(Fournisseur $fournisseur):int{
        $sql="UPDATE `fournisseur` SET `telephone` = '77 333 65 74' WHERE `fournisseur`.`id` = '".$fournisseur->getId()."';";
        $nbreFournisseurUpdate=0;
        try{
            $nbreFournisseurUpdate=$this->database->getPdo()->exec($sql);
        } catch (\PDOException $ex) {
            echo("Erreur".$ex->getMessage());
            exit;
        }
        return $nbreFournisseurUpdate;
    }

    public function count():int{
        $sql="SELECT count(id) as count FROM `fournisseur`";
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
        $sql="SELECT id FROM `fournisseur` ORDER by `id` desc LIMIT 0,1";
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