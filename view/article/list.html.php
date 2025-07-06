<?php
        if ($_SESSION['user']['role']=="Admin"): ?>
                    <div class="tabs">
                        <div>
                            <a href=""><div class="tab active">Confection</div></a>
                            <a href=""><div class="tab">Vente</div></a>
                        </div>
                        
                        <a href="/public/index.php?controller=article&action=form"><button class="add-btn" href="">Ajouter</button></a>
                    </div>
            <?php endif ?>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Libelle</th>
            <th>Qte Stock</th>
            <th>Prix Appro</th>
            <th>Categorie</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="body-table">
    <?php foreach($articleConfections as $articleConfection):?>
        <tr>
            <td><?=$articleConfection->getId()?></td>
            <td class="libelle">
                <div class="circle"></div>
                <div>
                    <div class="bold"><?=$articleConfection->getLibelle()?></div>
                    <div>Rouge</div>
                </div>
            </td>
            <td><?=$articleConfection->getQteStock()?></td>
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

<div class="pagination">
    <button>Précédent</button>
    <span class="active-page">1</span>
    <span>2</span>
    <button>Suivant</button>
</div>