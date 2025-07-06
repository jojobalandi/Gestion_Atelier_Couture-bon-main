<?php
try {
    $pdo = new PDO("mysql:host=127.0.0.1;port=8889;dbname=Atelier_couture;charset=utf8", "root", "root");

    ;
    echo "Connexion réussie !";
} catch (PDOException $e) {
    echo "Erreur connexion BDD : " . $e->getMessage();
}
