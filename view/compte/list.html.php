<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="/public/css/compte_list.css">
</head>
<body>

<div class="top-bar">
    <a href="/public/index.php?controller=compte&action=login"><button class="add-btn">Ajouter</button></a>
</div>



<table>
    <thead>
        <tr>
            <th>#</th>
            <th>DATE</th>
            <th>MONTANT</th>
            <th>FOURNISSEUR</th>
            <th>TELEPHONE</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $comptes = [];
        foreach($comptes as $compte):?>
        <tr>
            <td><?=$compte->getId()?></td>
            <td class="libelle">
                <div class="circle"></div>
                <div>
                    <div class="bold"><?=$compte->getNom()?></div>
                    <div><?=$compte->getPrenom()?></div>
                </div>
            </td>
            <td><?= $articleConfection = [];
                $articleConfection->getQteStock()?></td>
            <td><?=$articleConfection->getLibelle()?></td>
            <td><?=$articleConfection->getCategorie()?></td>
            <td class="actions">
                <a href="#">Edit</a>
                <a href="#">Delete</a>
            </td>
        </tr>
        <?php endforeach?>
    </tbody>
</table>
<?php if (!empty($comptes) && is_iterable($comptes)): ?>
    <?php foreach($comptes as $compte): ?>
        <!-- ton affichage ici -->
    <?php endforeach; ?>
<?php else: ?>
    <tr><td colspan="5">Aucun compte trouvé.</td></tr>
<?php endif; ?>

<div class="pagination">
    <button>Précédent</button>
    <span class="active-page">1</span>
    <span>2</span>
    <button>Suivant</button>
</div>

