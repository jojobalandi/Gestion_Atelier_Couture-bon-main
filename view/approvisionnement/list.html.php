<div class="top-bar">
    <a href="/public/index.php?controller=approvisionnement&action=form"><button class="add-btn">Ajouter</button></a>
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
        <?php foreach($approvisionnements as $approvisionnement):?>
        <tr>
            <td><?=$approvisionnement->getId()?></td>
            <td><?=$approvisionnement->getDateApproviToString()?></td>
            <td><?=$approvisionnement->getMonActuelStock()?></td>
            <td><?=$approvisionnement->getFournisseur()?></td>
            <td>771001011</td>
            <td class="actions">
                <a href="#">Delete</a>
                <a href="#">More</a>
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

