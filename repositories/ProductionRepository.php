<?php
require_once "./../config/Database.php";
require_once "./../model/Production.php";

class ProductionRepository {
    private Database $database;

    public function __construct() {
        $this->database = new Database;
    }

    public function selectAllProduction(?string $clientId = null, int $limit = 10, int $offset = 0): array {
        try {
            $sql = "SELECT * FROM production";
            $params = [];

            if ($clientId !== null) {
                $sql .= " WHERE client_id = :clientId";
                $params[':clientId'] = $clientId;
            }

            $sql .= " ORDER BY id DESC LIMIT :limit OFFSET :offset";

            $stmt = $this->database->getPdo()->prepare($sql);

            if ($clientId !== null) {
                $stmt->bindValue(':clientId', $clientId, PDO::PARAM_STR);
            }
            $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);

            $stmt->execute();

            $productions = [];
            while ($row = $stmt->fetch()) {
                $productions[] = Production::toProduction($row);
            }
            return $productions;
        } catch (\PDOException $ex) {
            echo("Erreur " . $ex->getMessage());
            exit;
        }
        return [];
    }

    public function selectProductionById(string $id): ?Production {
        $sql = "SELECT * FROM production WHERE id = :id";
        try {
            $stmt = $this->database->getPdo()->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_STR);
            $stmt->execute();
            if ($row = $stmt->fetch()) {
                return Production::toProduction($row);
            }
        } catch (\PDOException $ex) {
            echo("Erreur " . $ex->getMessage());
            exit;
        }
        return null;
    }

    public function insertProduction(Production $production): int {
        $sql = "INSERT INTO production (id, observation, articleVente, qteProduit) VALUES (:id, :observation, :articleVente, :qteProduit)";
        try {
            $stmt = $this->database->getPdo()->prepare($sql);
            $stmt->bindValue(':id', $production->getId());
            $stmt->bindValue(':observation', $production->getObservation());
            $stmt->bindValue(':articleVente', $production->getArticleVente());
            $stmt->bindValue(':qteProduit', $production->getQteProduit());
            return $stmt->execute() ? 1 : 0;
        } catch (\PDOException $ex) {
            echo("Erreur " . $ex->getMessage());
            exit;
        }
        return 0;
    }

    public function updateProduction(Production $production): int {
        $sql = "UPDATE production SET observation = :observation, articleVente = :articleVente, qteProduit = :qteProduit WHERE id = :id";
        try {
            $stmt = $this->database->getPdo()->prepare($sql);
            $stmt->bindValue(':observation', $production->getObservation());
            $stmt->bindValue(':articleVente', $production->getArticleVente());
            $stmt->bindValue(':qteProduit', $production->getQteProduit());
            $stmt->bindValue(':id', $production->getId());
            return $stmt->execute() ? 1 : 0;
        } catch (\PDOException $ex) {
            echo("Erreur " . $ex->getMessage());
            exit;
        }
        return 0;
    }

    public function count(?string $clientId = null): int {
        $sql = "SELECT COUNT(id) as count FROM production";
        $params = [];
        if ($clientId !== null) {
            $sql .= " WHERE client_id = :clientId";
            $params[':clientId'] = $clientId;
        }
        try {
            $stmt = $this->database->getPdo()->prepare($sql);
            if ($clientId !== null) {
                $stmt->bindValue(':clientId', $clientId, PDO::PARAM_STR);
            }
            $stmt->execute();
            if ($row = $stmt->fetch()) {
                return (int)$row["count"];
            }
        } catch (\PDOException $ex) {
            echo("Erreur " . $ex->getMessage());
            exit;
        }
        return 0;
    }

    public function selectLastInsertId(): int {
        $sql = "SELECT id FROM production ORDER BY id DESC LIMIT 1";
        try {
            $stmt = $this->database->getPdo()->query($sql);
            if ($row = $stmt->fetch()) {
                return (int)$row["id"];
            }
        } catch (\PDOException $ex) {
            echo("Erreur " . $ex->getMessage());
            exit;
        }
        return 0;
    }
}
