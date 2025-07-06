<?php

$productions = $productions ?? [];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard - Atelier Couture</title>
    <link rel="stylesheet" href="/public/css/prod_list.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<div class="top-bar">
    <a href="/public/index.php?controller=production&action=form" class="add-btn">Ajouter une production</a>
</div>

<table class="production-table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Article</th>
        <th>Date</th>
        <th>Quantité Produite</th>
        <th>Observation</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php if (empty($productions)): ?>
        <tr>
            <td colspan="6" class="no-data">Aucune production trouvée.</td>
        </tr>
    <?php else: ?>
        <?php foreach ($productions as $prod): ?>
            <tr>
                <td><?= htmlspecialchars($prod->getId() ?? $prod['id'] ?? '') ?></td>
                <td><?= htmlspecialchars($prod->getArticle() ?? $prod['article'] ?? '') ?></td>
                <td><?= htmlspecialchars($prod->getDate() ?? $prod['date'] ?? '') ?></td>
                <td><?= htmlspecialchars($prod->getQteProduite() ?? $prod['qteProduite'] ?? '') ?></td>
                <td><?= htmlspecialchars($prod->getObservation() ?? $prod['observation'] ?? '') ?></td>
                <td>
                    <a href="/public/index.php?controller=production&action=edit&id=<?= urlencode($prod->getId() ?? $prod['id'] ?? '') ?>" class="action-btn edit">Modifier</a>
                    <a href="/public/index.php?controller=production&action=delete&id=<?= urlencode($prod->getId() ?? $prod['id'] ?? '') ?>" class="action-btn delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette production ?');">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>
