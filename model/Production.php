<?php

class Production{
    private int $id=0;
    private string $observation;
    private string $articleVente;
    private int $qteProduit;
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
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

    public function getArticleVente()
    {
        return $this->articleVente;
    }

    public function setArticleVente($articleVente)
    {
        $this->articleVente = $articleVente;

        return $this;
    }


    public function getQteProduit()
    {
        return $this->qteProduit;
    }

    public function setQteProduit($qteProduit)
    {
        $this->qteProduit = $qteProduit;

        return $this;
    }

    public static function toProduction($row):Production{
        $production=new Production();
        $production->setId($row['id']);
        $production->setObservation($row['observation']);
        $production->setArticleVente($row['articleVente']);
        $production->setQteProduit($row['qteProduit']);
        return $production;
    }


}