<?php
require_once "./../config/Database.php";
require_once "./../model/ArticleVente.php";
class ArticleVenteRepository{
    private Database $database;
    public function __construct()
    {
        $this->database = new Database;
    }

    public function selectAllArticleVente():array{
        $sql="SELECT * FROM `article_vente`";
        try {
                $stmt = $this->database->getPdo()->query($sql);
                $articleVentes=[];
                while ($row = $stmt->fetch()) {
                    $articleVentes[]=ArticleVente::toArticleVente($row);
                }
                return $articleVentes;
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            throw $ex;
        }  
        return [];
    }

    public function selectArticleVenteById(String $id):ArticleVente|null{
        $sql="select * from article_vente where id='$id'";
        try {
            $stmt = $this->database->getPdo()->query($sql);
            if($row = $stmt->fetch()){
                return ArticleVente::toArticleVente($row);
            }
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            throw $ex;
        }  
        return null;
    }

    public function insertArticleVente(ArticleVente $articleVente):int{
        $sql= "INSERT INTO `article_vente` (`id`, `libelle`, `qteStock`, `prixVente`, `montVente`, `categorie`) VALUES ('".$articleVente->getId()."', '".$articleVente->getLibelle()."', '".$articleVente->getQteStock()."', '".$articleVente->getPrixVente()."', '".$articleVente->getMontVente()."', '".$articleVente->getCategorie()."');";
        $nbreArticleVenteInsere =0;
        try {
            $nbreArticleVenteInsere = $this->database->getPdo()->exec($sql); 
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            throw $ex;
        }  

        return  $nbreArticleVenteInsere;
    }

    public function count():int{
        $sql="SELECT count(id) as count FROM `article_vente`";
        try {
            $stmt = $this->database->getPdo()->query($sql);
            if($row = $stmt->fetch()){
            return $row["count"];
            }
        } catch (\PDOException $ex) {
                echo("Erreur ".$ex->getMessage());
            throw $ex;
        }  
        return 0;
    }

    public function selectLastInsertId():int{
        $sql="SELECT id FROM `article_vente` ORDER by `id` desc LIMIT 0,1";
        try {
            $stmt = $this->database->getPdo()->query($sql);
            if($row = $stmt->fetch()){
            return $row["id"];
            }       
        } catch (\PDOException $ex) {
                echo("Erreur ".$ex->getMessage());
            throw $ex;
        }  
        return 0;
    }

}