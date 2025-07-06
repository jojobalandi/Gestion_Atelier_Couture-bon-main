<?php
require_once "./../model/Article.php";
class ArticleConfection extends Article {
    private int $prixAchat;
    private int $qteAchat;
    private int $montStock;


    public function getPrixAchat()
    {
        return $this->prixAchat;
    }


    public function setPrixAchat($prixAchat)
    {
        $this->prixAchat = $prixAchat;

        return $this;
    }


    public function getQteAchat()
    {
        return $this->qteAchat;
    }


    public function setQteAchat($qteAchat)
    {
        $this->qteAchat = $qteAchat;

        return $this;
    }


    public function getMontStock()
    {
        return $this->montStock;
    }


    public function setMontStock($montStock)
    {
        $this->montStock = $montStock;

        return $this;
    }

    public static function toArticleConfection($row):ArticleConfection{
        $articleConfection=new ArticleConfection();
        $articleConfection->setId($row['id']);
        $articleConfection->setLibelle($row['libelle']);
        $articleConfection->setPrixAchat($row['prixAchat']);
        $articleConfection->setQteStock($row['qteStock']);
        $articleConfection->setMontStock($row['montStock']);
        $articleConfection->setQteAchat($row['qteAchat']);
        $articleConfection->setCategorie($row['categorie']);
        return $articleConfection;

    }


}