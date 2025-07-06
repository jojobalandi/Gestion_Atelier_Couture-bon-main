<?php
require_once "./../model/Approvisionnement.php";
require_once "./../repositories/ApprovisionnementRepository.php";
class ApprovisionnementService{
    private ApprovisionnementRepository $approvisionnementRepository;
    private const LIMIT=2;

    public function __construct(){
        $this->approvisionnementRepository = new ApprovisionnementRepository();
    }

    public function listerApprovisionnement(): array{
        return $this->approvisionnementRepository->selectAllApprovisionnement();
    }

    public function addApprovisionnement(Approvisionnement $approvisionnement): void{
        $this->approvisionnementRepository->insertApprovisionnement($approvisionnement);
    }

    public function searchApprovisionnementbyId(string $id): Approvisionnement|null{
        return $this->approvisionnementRepository->selectApprovisionnementById($id);
    }

    public function  getNbrePage():int {
        $totalElement=$this->approvisionnementRepository->count();
        return ceil( $totalElement/self::LIMIT);
    }

    
    private function generateNumero():string{
        $lastId=$this->approvisionnementRepository->selectLastInsertId();
        return $lastId+1;
    }
}