<?php
require_once "./../config/Database.php";
require_once "./../model/Categorie.php";
class CategorieRepository{
    private Database $database;
    public function __construct()
    {
        $this->database = new Database;
    }

    public function selectAllCategorie():array{
        $sql="SELECT * FROM `categorie`";
        try {
                $stmt = $this->database->getPdo()->query($sql);
                $categories=[];
                while ($row = $stmt->fetch()) {
                    $categories[]=Categorie::toCategorie($row);
                }
                return $categories;
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  
        return [];
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

    public function insertCategorie(Categorie $categorie):int{
        $sql= "INSERT INTO `categorie` (`id`, `libelle`, `type`) VALUES ('".$categorie->getId()."', '".$categorie->getLibelle()."', '".$categorie->getType()."');";
        $nbreCategorieInsere =0;
        try {
            $nbreCategorieInsere = $this->database->getPdo()->exec($sql); 
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  

        return  $nbreCategorieInsere;
    }

    public function count():int{
        $sql="SELECT count(id) as count FROM `categorie`";
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
        $sql="SELECT id FROM `categorie` ORDER by `id` desc LIMIT 0,1";
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