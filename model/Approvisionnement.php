<?php

class Approvisionnement{
    private int $id=0;

    private \DateTime $dateApprovi;

    private string $fournisseur;

    private string $articleConfection;

    private int $qteStock;

    private int $monActuelStock;


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getDateApprovi()
    {
        return $this->dateApprovi;
    }

    public function getDateApproviToString():string{
        return $this->dateApprovi->format("d-m-y");
    }


    public function setDateApprovi($dateApprovi)
    {
        $this->dateApprovi = $dateApprovi;

        return $this;
    }


    public function getFournisseur()
    {
        return $this->fournisseur;
    }


    public function setFournisseur($fournisseur)
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getArticleConfection()
    {
        return $this->articleConfection;
    }


    public function setArticleConfection($articleConfection)
    {
        $this->articleConfection = $articleConfection;

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


    public function getMonActuelStock()
    {
        return $this->monActuelStock;
    }


    public function setMonActuelStock($monActuelStock)
    {
        $this->monActuelStock = $monActuelStock;

        return $this;
    }

    public static function toApprovisionnement($row):Approvisionnement{
        $approvisionnement=new Approvisionnement();
        $approvisionnement->setId($row['id']);
        $approvisionnement->setFournisseur($row['fournisseur']);
        $approvisionnement->setDateApprovi(new DateTime($row['dateApprovi']));
        $approvisionnement->setMonActuelStock($row['monActuelStock']);
        $approvisionnement->setQteStock($row['qteStock']);
        return $approvisionnement;
    }

}