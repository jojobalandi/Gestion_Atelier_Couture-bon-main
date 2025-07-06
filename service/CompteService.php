<?php
// Assurez-vous que ces chemins sont corrects par rapport à l'emplacement de CompteService.php
require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../repositories/CompteRepository.php"; // Chemin corrigé : de 'repositories' à 'repository'
require_once __DIR__ . "/../model/Compte.php";

class CompteService {
    private CompteRepository $compteRepository;

    public function __construct() {
        $database = new Database();
        $this->compteRepository = new CompteRepository($database);
    }

    public function seConnecter(string $login, string $password, string $role): ?Compte {
        $userData = $this->compteRepository->findByLoginAndRole($login, $role);

        if ($userData && password_verify($password, $userData['password'])) {
            $compte = Compte::fromArray($userData);
            return $compte;
        }

        return null;
    }

    public function creerCompte(string $login, string $plainPassword, string $role): bool {
        $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);
        if ($hashedPassword === false) {
            error_log("Erreur lors du hachage du mot de passe pour l'utilisateur: " . $login);
            return false;
        }

        return $this->compteRepository->save($login, $hashedPassword, $role);
    }

    public function getAllComptes(): array {
        $usersData = $this->compteRepository->selectAllUser();
        $comptes = [];
        foreach ($usersData as $data) {
            $comptes[] = Compte::fromArray($data);
        }
        return $comptes;
    }

}