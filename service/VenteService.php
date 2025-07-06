<?php
require_once "./../model/Vente.php";
require_once "./../repositories/VenteRepository.php";

class VenteService{
    private VenteRepository $venteRepository;
    private const LIMIT=2;

    public function __construct(){
        $this->venteRepository = new VenteRepository();
    }

    public function listerVente(): array{
        return $this->venteRepository->selectAllVente();
    }

    public function addVente(Vente $vente): void{
        $this->venteRepository->insertVente($vente);
    }

    public function enregistrerVente(Vente $vente): void{
        $this->addVente($vente);
    }

    public function searchVentebyId(string $id): Vente|null{
        return $this->venteRepository->selectVenteById($id);
    }

    public function  getNbrePage():int {
        $totalElement=$this->venteRepository->count();
        return ceil( $totalElement/self::LIMIT);
    }

    private function generateNumero():string{
        $lastId=$this->venteRepository->selectLastInsertId();
        return $lastId+1;
    }
}