<?php

class Article{
    protected int $id=0;
    protected string $libelle;
    protected int $qteStock;
    protected string $categorie;
    protected string  $photo;

    public function getLibelle()
    {
        return $this->libelle;
    }


    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }


    public function getQteStock()
    {
        return $this->qteStock;
    }


    public function setQteStock($qteStock)
    {
        $this->qteStock = $qteStock;

        return $this;
    }


    public function getPhoto()
    {
        return $this->photo;
    }


    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }


    public function getCategorie()
    {
        return $this->categorie;
    }


    public function setCategorie(string $categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}