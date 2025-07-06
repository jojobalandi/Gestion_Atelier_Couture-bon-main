<?php

require_once "Personne.php";

class Fournisseur extends Personne{

    private String $telFixe;
    

    public function getTelFixe()
    {
        return $this->telFixe;
    }


    public function setTelFixe($telFixe)
    {
        $this->telFixe = $telFixe;

        return $this;
    }

    public static function toFournisseur($row):Fournisseur{
        $fournisseur=new Fournisseur();
        $fournisseur->setId($row['id']);
        $fournisseur->setNom($row['nom']);
        $fournisseur->setPrenom($row['prenom']);
        $fournisseur->setAdresse($row['adresse']);
        $fournisseur->setTelephone($row['tel']);
        $fournisseur->setTelFixe($row['telFixe']);
        return $fournisseur;

    }

}