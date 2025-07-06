

<div class="tabs">
    <button class="add-btn" href="index.php?controller=categorie&action=form">Ajouter</button>
</div>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>LIBELLE</th>
            <th>TYPE</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($categories as $categorie):?>
        <tr>
            <td><?=$categorie->getId()?></td>
            <td class="libelle">
                <div class="circle"></div>
                <div>
                    <div class="bold"><?=$categorie->getLibelle()?></div>
                    <div><?=$categorie->getType()?></div>
                </div>
            </td>
            <td><?=$categorie->getTelephone()?></td>
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