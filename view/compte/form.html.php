<?php
$erreurs = $_SESSION['erreurs'] ?? [];
$data = $_SESSION['data'] ?? [];
unset($_SESSION['erreurs'], $_SESSION['data']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? "Atelier Couture" ?></title>
    <link rel="stylesheet" href="/public/css/compte_form.css">
</head>
<div class="form-container">
    <div class="form-header">
        <?= isset($data['id']) ? "Modifier un compte" : "Ajouter un compte" ?>
    </div>

    <form action="/public/index.php" method="post">
        <input type="hidden" name="controller" value="compte">
        <input type="hidden" name="action" value="<?= isset($data['id']) ? 'update' : 'create' ?>">
        <?php if (isset($data['id'])): ?>
            <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">
        <?php endif; ?>

        <label for="username">Nom d'utilisateur</label>
        <input type="text" id="username" name="username" value="<?= htmlspecialchars($data['username'] ?? '') ?>">
        <small class="error"><?= $erreurs['username'] ?? '' ?></small>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($data['email'] ?? '') ?>">
        <small class="error"><?= $erreurs['email'] ?? '' ?></small>

        <label for="role">Rôle</label>
        <select id="role" name="role">
            <option value="">-- Sélectionnez un rôle --</option>
            <option value="Admin" <?= (isset($data['role']) && $data['role'] === 'Admin') ? 'selected' : '' ?>>Admin</option>
            <option value="RS" <?= (isset($data['role']) && $data['role'] === 'RS') ? 'selected' : '' ?>>RS</option>
            <option value="RP" <?= (isset($data['role']) && $data['role'] === 'RP') ? 'selected' : '' ?>>RP</option>
            <option value="Vendeur" <?= (isset($data['role']) && $data['role'] === 'Vendeur') ? 'selected' : '' ?>>Vendeur</option>
        </select>
        <small class="error"><?= $erreurs['role'] ?? '' ?></small>

        <label for="password">Mot de passe <?= isset($data['id']) ? "(laisser vide pour ne pas changer)" : "" ?></label>
        <input type="password" id="password" name="password">
        <small class="error"><?= $erreurs['password'] ?? '' ?></small>

        <button type="submit" class="save-btn"><?= isset($data['id']) ? "Modifier" : "Ajouter" ?></button>
    </form>
</div>
