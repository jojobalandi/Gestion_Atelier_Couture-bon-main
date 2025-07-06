<?php
require_once "./../model/Production.php";
require_once "./../repositories/ProductionRepository.php";

class ProductionService {
    private ProductionRepository $productionRepository;
    private const LIMIT = 2;

    public function __construct() {
        $this->productionRepository = new ProductionRepository();
    }

    public function listerProduction(?string $clientId = null, int $page = 1): array {
        $offset = ($page - 1) * self::LIMIT;
        return $this->productionRepository->selectAllProduction($clientId, self::LIMIT, $offset);
    }

    public function addProduction(Production $production): void {
        $this->productionRepository->insertProduction($production);
    }

    public function searchProductionById(string $id): ?Production {
        return $this->productionRepository->selectProductionById($id);
    }

    public function getNbrePage(?string $clientId = null): int {
        $totalElement = $this->productionRepository->count($clientId);
        return ceil($totalElement / self::LIMIT);
    }

    public function generateNumero(): string {
        $lastId = $this->productionRepository->selectLastInsertId();
        return "PRD-" . ($lastId + 1);
    }
}
