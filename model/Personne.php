<?php
class Personne{
        protected int $id=0;
        protected string $nom;
        protected string $prenom;
        protected string $adresse='';
        protected string $telephone;
        protected  $photo=NULL;

        protected Compte $compte;

        public function __construct(){
        }

        public function getNom(): string
        {
                return $this->nom;
        }


        public function setNom($nom): static
        {
                $this->nom = $nom;

                return $this;
        }

        public function getPrenom(): string
        {
                return $this->prenom;
        }


        public function setPrenom($prenom): static
        {
                $this->prenom = $prenom;

                return $this;
        }


        public function getAdresse(): string
        {
                return $this->adresse;
        }

        public function setAdresse($adresse): static
        {
                $this->adresse = $adresse;

                return $this;
        }

        public function getTelephone(): string
        {
                return $this->telephone;
        }


        public function setTelephone($telephone): static
        {
                $this->telephone = $telephone;

                return $this;
        }

        public function getPhoto()
        {
                return $this->photo;
        }


        public function setPhoto($photo): static
        {
                $this->photo = $photo;
                return $this;
        }

        public function getId(): int
        {
                return $this->id;
        }

        public function setId($id):int
        {
                $this->id = $id;

                return $this->id;
        }


        public function getCompte(): Compte
        {
                return $this->compte;
        }


        public function setCompte($compte): static
        {
                $this->compte = $compte;

                return $this;
        }
}