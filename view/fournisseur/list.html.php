<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? "Atelier Couture" ?></title>
    <link rel="stylesheet" href="/public/css/fournisseur-lister.css">
</head>


<div class="tabs">
    <button class="add-btn" href="/public/index.php?controller=fournisseur&action=form">Ajouter</button>
</div>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>NOM</th>
            <th>TELEPHONE</th>
            <th>ADRESSE</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php $fournisseurs = [];
    foreach($fournisseurs as $fournisseur):?>
        <tr>
            <td><?=$fournisseur->getId()?></td>
            <td class="libelle">
                <div class="circle"></div>
                <div>
                    <div class="bold"><?=$fournisseur->getNom()?></div>
                    <div><?=$fournisseur->getPrenom()?></div>
                </div>
            </td>
            <td><?=$fournisseur->getTelephone()?></td>
            <td><?=$fournisseur->getAdresse()?></td>
            <td class="actions">
                <a href="#">Edit</a>
                <a href="#">Delete</a>
            </td>
        </tr>
        <?php endforeach?> 
    </tbody>
</table>

<div class="pagination">
    <button>Précédent</button>
    <span class="active-page">1</span>
    <span>2</span>
    <button>Suivant</button>
</div>