<?php
require_once "./../model/Categorie.php";
require_once "./../repositories/CategorieRepository.php";

class CategorieService{
    private CategorieRepository $categorieRepository;
    private const LIMIT=2;

    public function __construct(){
        $this->categorieRepository = new CategorieRepository();
    }

    public function listerCategorie(): array{
        return $this->categorieRepository->selectAllCategorie();
    }

    public function addcategorie(Categorie $categorie): void{
        $this->categorieRepository->insertCategorie($categorie);
    }

    public function searchClientbyId(string $id): Categorie|null{
        return $this->categorieRepository->selectCategorieById($id);
    }

    public function  getNbrePage():int {
        $totalElement=$this->categorieRepository->count();
        return ceil( $totalElement/self::LIMIT);
    }

    private function generateNumero():string{
        $lastId=$this->categorieRepository->selectLastInsertId();
        return $lastId+1;
    }
}