<?php

class Categorie{
    private int $id=0;
    private string $libelle;

    private string $type;


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }


    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    public static function toCategorie($row):Categorie{
        $categorie=new Categorie();
        $categorie->setId($row['id']);
        $categorie->setLibelle($row['libelle']);
        $categorie->setType($row['type']);
        return $categorie;
    }


    public function getType()
    {
        return $this->type;
    }


    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}