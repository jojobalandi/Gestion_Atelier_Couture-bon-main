<?php

class Vente {
    private int $id = 0;
    private int $clientId;
    private int $articleId;
    private \DateTime $dateVente;

    private string $client;
    private string $articleVente;

    private int $qteVendue;
    private int $montantVente;
    private int $prixUnitaire;

    public function __construct() {
        $this->dateVente = new \DateTime();
    }

    public function getClientId(): int
    {
        return $this->clientId;
    }

    public function setClientId(int $clientId): self
    {
        $this->clientId = $clientId;
        return $this;
    }

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function setArticleId(int $articleId): self
    {
        $this->articleId = $articleId;
        return $this;
    }

    public function getClient(): string
    {
        return $this->client;
    }


    public function setClient(string $client): self
    {
        $this->client = $client;
        return $this;
    }

    public function getArticleVente(): string
    {
        return $this->articleVente;
    }

    public function setArticleVente(string $articleVente): self
    {
        $this->articleVente = $articleVente;
        return $this;
    }

    public function getQteVendue(): int
    {
        return $this->qteVendue;
    }

    public function setQteVendue(int $qteVendue): self
    {
        $this->qteVendue = $qteVendue;
        return $this;
    }


    public function getMontantVente(): int
    {
        return $this->montantVente;
    }


    public function setMontantVente(int $montantVente): self
    {
        $this->montantVente = $montantVente;
        return $this;
    }

    public function getPrixUnitaire(): int
    {
        return $this->prixUnitaire;
    }

    public function setPrixUnitaire(int $prixUnitaire): self
    {
        $this->prixUnitaire = $prixUnitaire;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getDateVente(): \DateTime
    {
        return $this->dateVente;
    }

    public function getDateVenteToString(): string
    {
        return $this->dateVente->format("d/m/Y"); // Format YYYY pour l'année
    }

    public function setDateVente(\DateTime $dateVente): self
    {
        $this->dateVente = $dateVente;
        return $this;
    }

    public static function toVente(array $row): Vente
    {
        $vente = new Vente();
        $vente->setId((int)$row['id']);
        if (isset($row['client_id'])) {
            $vente->setClientId((int)$row['client_id']);
        }
        if (isset($row['article_id'])) {
            $vente->setArticleId((int)$row['article_id']);
        }

        if (isset($row['client'])) {
            $vente->setClient($row['client']);
        }
        if (isset($row['articleVente'])) {
            $vente->setArticleVente($row['articleVente']);
        }

        if (isset($row['dateVente'])) {
            $vente->setDateVente(new \DateTime($row['dateVente']));
        }
        if (isset($row['qteVendue'])) {
            $vente->setQteVendue((int)$row['qteVendue']);
        }
        if (isset($row['montantVente'])) {
            $vente->setMontantVente((int)$row['montantVente']);
        }
        if (isset($row['prixUnitaire'])) {
            $vente->setPrixUnitaire((int)$row['prixUnitaire']);
        }

        return $vente;
    }
}