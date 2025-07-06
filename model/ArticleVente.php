<?php

require_once __DIR__ . '/Article.php';

class ArticleVente extends Article{
    private int $prixVente;
    private int $montVente;


    public function getPrixVente()
    {
        return $this->prixVente;
    }


    public function setPrixVente($prixVente)
    {
        $this->prixVente = $prixVente;

        return $this;
    }


    public function getMontVente()
    {
        return $this->montVente;
    }


    public function setMontVente($montVente)
    {
        $this->montVente = $montVente;

        return $this;
    }


    public static function toArticleVente($row):ArticleVente{
        $articleVente=new ArticleVente();
        $articleVente->setId($row['id']);
        $articleVente->setLibelle($row['libelle']);
        $articleVente->setPrixVente($row['prixVente']);
        $articleVente->setQteStock($row['qteStock']);
        $articleVente->setMontVente($row['montStock']);
        $articleVente->setCategorie($row['categorie']);
        return $articleVente;

    }

}