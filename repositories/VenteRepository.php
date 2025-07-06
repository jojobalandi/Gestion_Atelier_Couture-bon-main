<?php
require_once "./../config/Database.php";
require_once "./../model/Vente.php";
class VenteRepository{
    private Database $database;

    public function __construct()
    {
        $this->database = new Database;
    }

    public function selectAllVente():array{
        $sql="SELECT * FROM `vente`";
        try {
                $stmt = $this->database->getPdo()->query($sql);
                $ventes=[];
                while ($row = $stmt->fetch()) {
                    $ventes[]=Production::toProduction($row);
                }
                return $ventes;
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  
        return [];
    }

    public function selectVenteById(String $id):Vente|null{
        $sql="select * from vente where id='$id'";
        try {
            $stmt = $this->database->getPdo()->query($sql);
            if($row = $stmt->fetch()){
                return Vente::toVente($row);
            }
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  
        return null;
    }

    public function insertVente(Vente $vente):int{
        $sql= "INSERT INTO `vente` (`id`, `client`, `articleVente`, `dateVente`, `qteVendue`, `montantVente`,`prixUnitaire`) VALUES ('".$vente->getId()."', '".$vente->getClient()."', '".$vente->getArticleVente()."', '".$vente->getDateVente()."', '".$vente->getQteVendue()."', '".$vente->getMontantVente()."', '".$vente->getPrixUnitaire()."');";
        $nbreVenteInsere =0;
        try {
            $nbreVenteInsere = $this->database->getPdo()->exec($sql); 
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  

        return  $nbreVenteInsere;
    }

    public function updateVente(Vente $vente):int{
        $sql="UPDATE `vente` SET `telephone` = '77 333 65 74' WHERE `vente`.`id` = '".$vente->getId()."';";
        $nbreVenteUpdate=0;
        try{
            $nbreVenteUpdate=$this->database->getPdo()->exec($sql);
        } catch (\PDOException $ex) {
            echo("Erreur".$ex->getMessage());
            exit;
        }
        return $nbreVenteUpdate;
    }

    public function count():int{
        $sql="SELECT count(id) as count FROM `vente`";
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
        $sql="SELECT id FROM `vente` ORDER by `id` desc LIMIT 0,1";
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