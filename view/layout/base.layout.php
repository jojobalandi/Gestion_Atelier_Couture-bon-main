<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user = $_SESSION['user'] ?? null;
if (!$user || !isset($user['username'], $user['role'])) {
    header("Location: /public/index.php?controller=security&action=form");
    exit;
}

require_once __DIR__ . "/header.inc.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard - Atelier Couture</title>
    <link rel="stylesheet" href="/public/css/base_layout.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<aside class="sidebar">
    <div class="logo">
        <img src="/public/images/gestCout.png" alt="Logo Atelier Couture" />
    </div>

    <nav class="menu">
        <?php
        switch ($user['role']) {
            case 'Admin':
                require_once __DIR__ . "/gestionnaire.layout.php";
                break;
            case 'RS':
                require_once __DIR__ . "/rs.layout.php";
                break;
            case 'RP':
                require_once __DIR__ . "/rp.layout.php";
                break;
            default:
                require_once __DIR__ . "/vendeur.layout.php";
                break;
        }
        ?>
    </nav>

    <div class="profile">
        <img src="/public/images/user.jpg" alt="Photo utilisateur" />
        <div class="profile-info">
            <div class="name"><?= htmlspecialchars($user['username'] ?? '') ?></div>
            <div class="role"><?= htmlspecialchars($user['role'] ?? '') ?></div>
        </div>
    </div>
</aside>

<main class="main-content">
    <?= $view ?? '' ?>
</main>

<script src="/public/js/all.js"></script>
</body>
</html>
