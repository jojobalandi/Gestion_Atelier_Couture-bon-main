<?php
require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../model/Compte.php";

class CompteRepository{
    private PDO $pdo;

    public function __construct(Database $database) {
        $this->pdo = $database->getPdo();
    }

    public function findByLoginAndRole(string $login, string $role): array|false {
        $sql = "SELECT id, login, password, role FROM `Atelier_couture`.`compte` WHERE login = :login AND role = :role LIMIT 1";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':login' => $login,
                ':role' => $role
            ]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $ex) {
            error_log("Erreur dans CompteRepository::findByLoginAndRole : " . $ex->getMessage());
            echo "<h2>Erreur de base de données (DEBUG) :</h2>";
            echo "<p>Méthode: findByLoginAndRole</p>";
            echo "<p>Message détaillé : <strong>" . htmlspecialchars($ex->getMessage()) . "</strong></p>";
            echo "<p>Code d'erreur SQLSTATE : <strong>" . htmlspecialchars($ex->getCode()) . "</strong></p>";
            exit;
        }
    }


    public function save(string $login, string $hashedPassword, string $role): bool {
        $sql = "INSERT INTO `Atelier_couture`.`compte` (login, password, role) VALUES (:login, :password, :role)";

        try {
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                ':login' => $login,
                ':password' => $hashedPassword,
                ':role' => $role
            ]);
        } catch (\PDOException $ex) {
            error_log("Erreur dans CompteRepository::save : " . $ex->getMessage());
            echo "<h2>Erreur de base de données (DEBUG) :</h2>";
            echo "<p>Méthode: save</p>";
            echo "<p>Message détaillé : <strong>" . htmlspecialchars($ex->getMessage()) . "</strong></p>";
            echo "<p>Code d'erreur SQLSTATE : <strong>" . htmlspecialchars($ex->getCode()) . "</strong></p>";
            exit;
        }
    }

    public function selectAllUserByRole(string $role): array {
        $sql = "SELECT id, login, password, role FROM `Atelier_couture`.`compte` WHERE role = :role";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':role' => $role]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $ex) {
            error_log("Erreur dans CompteRepository::selectAllUserByRole : " . $ex->getMessage());
            echo "<h2>Erreur de base de données (DEBUG) :</h2>";
            echo "<p>Méthode: selectAllUserByRole</p>";
            echo "<p>Message détaillé : <strong>" . htmlspecialchars($ex->getMessage()) . "</strong></p>";
            echo "<p>Code d'erreur SQLSTATE : <strong>" . htmlspecialchars($ex->getCode()) . "</strong></p>";
            exit;
        }
    }

    public function selectAllUser(): array {
        $sql = "SELECT id, login, password, role FROM `Atelier_couture`.`compte`";
        try {
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $ex) {
            error_log("Erreur dans CompteRepository::selectAllUser : " . $ex->getMessage());
            echo "<h2>Erreur de base de données (DEBUG) :</h2>";
            echo "<p>Méthode: selectAllUser</p>";
            echo "<p>Message détaillé : <strong>" . htmlspecialchars($ex->getMessage()) . "</strong></p>";
            echo "<p>Code d'erreur SQLSTATE : <strong>" . htmlspecialchars($ex->getCode()) . "</strong></p>";
            exit;
        }
    }
}