<?php
require_once "./../model/Fournisseur.php";
require_once "./../repositories/FournisseurRepository.php";

class FournisseurService{
    private FournisseurRepository $fournisseurRepository;
    private const LIMIT=2;

    public function __construct(){
        $this->fournisseurRepository = new FournisseurRepository();
    }


    public function listerFournisseur(): array{
        return $this->fournisseurRepository->selectAllFournisseur();
    }

    public function addFournisseur(Fournisseur $fournisseur): void{
        $this->fournisseurRepository->insertFournisseur($fournisseur);
    }

    public function searchClientbyId(string $id): Fournisseur|null{
        return $this->fournisseurRepository->selectFournisseurById($id);
    }

    public function  getNbrePage():int {
        $totalElement=$this->fournisseurRepository->count();
        return ceil( $totalElement/self::LIMIT);
    }

    private function generateNumero():string{
        $lastId=$this->fournisseurRepository->selectLastInsertId();
        return $lastId+1;
    }
}