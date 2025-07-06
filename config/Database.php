<?php

class Database{
    private \PDO|null $pdo = null;

    public function __construct(){
        try {
            $host = '127.0.0.1';
            $port = '8889';
            $dbname = 'Atelier_couture';
            $username = 'root';
            $password = 'root';
            $charset = 'utf8mb4';

            $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";

            if ($this->pdo == null) {
                $this->pdo = new PDO($dsn, $username, $password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            }
        } catch (\PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
            exit;
        }
    }

    public function getPdo() {
        return $this->pdo;
    }
}
