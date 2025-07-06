<?php
require_once "./../config/Database.php";
require_once "./../model/ArticleConfection.php";
class ArticleConfectionRepository{
    private Database $database;
    public function __construct()
    {
        $this->database = new Database;
    }

    public function selectAllArticleConfection():array{
        $sql="SELECT * FROM `article_confection`";
        try {
                $stmt = $this->database->getPdo()->query($sql);
                $articleConfections=[];
                while ($row = $stmt->fetch()) {
                    $articleConfections[]=ArticleConfection::toArticleConfection($row);
                }
                return $articleConfections;
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  
        return [];
    }

    public function updateArticleConfe(ArticleConfection $articleConfection):int{
        $sql="UPDATE `article_confection` SET `qteStock` = '".$articleConfection->getQteStock()."' WHERE `article_confection`.`id` = '".$articleConfection->getId()."';";
        $nbreArticleConfectionUpdate=0;
        try{
            $nbreArticleConfectionUpdate=$this->database->getPdo()->exec($sql);
        } catch (\PDOException $ex) {
            echo("Erreur".$ex->getMessage());
            exit;
        }
        return $nbreArticleConfectionUpdate;
    }

    public function selectArticleConfectionById(String $id):ArticleConfection|null{
        $sql="select * from article_confection where id='$id'";
        try {
            $stmt = $this->database->getPdo()->query($sql);
            if($row = $stmt->fetch()){
                return ArticleConfection::toArticleConfection($row);
            }
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  
        return null;
    }

    public function insertArticleConfection(ArticleConfection $articleConfection):int{
        $sql= "INSERT INTO `article_confection` (`id`, `libelle`, `qteStock`, `montStock`, `prixAchat`, `qteAchat`,`categorie`) VALUES ('".$articleConfection->getId()."', '".$articleConfection->getLibelle()."', '".$articleConfection->getQteStock()."', '".$articleConfection->getMontStock()."', '".$articleConfection->getPrixAchat()."', '".$articleConfection->getQteAchat()."', '".$articleConfection->getCategorie()."');";
        $nbreArticleConfectionInsere =0;
        try {
            $nbreArticleConfectionInsere = $this->database->getPdo()->exec($sql); 
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  

        return  $nbreArticleConfectionInsere;
    }


    public function count():int{
        $sql="SELECT count(id) as count FROM `article_confection`";
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
        $sql="SELECT id FROM `article_confection` ORDER by `id` desc LIMIT 0,1";
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

    public function selectCategorieById(String $id):Categorie|null{
        $sql="select * from categorie where id='$id'";
        try {
            $stmt = $this->database->getPdo()->query($sql);
            if($row = $stmt->fetch()){
                return Categorie::toCategorie($row);
            }
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  
        return null;
    }

}