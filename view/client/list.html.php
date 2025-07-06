

<div class="tabs">
    <a href="/public/index.php?controller=client&action=form"><button class="add-btn" href="">Ajouter</button></a>
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
    <?php foreach($clients as $client):?>
        <tr>
            <td><?=$client->getId()?></td>
            <td class="libelle">
                <div class="circle"></div>
                <div>
                    <div class="bold"><?=$client->getNom()?></div>
                    <div><?=$client->getPrenom()?></div>
                </div>
            </td>
            <td><?=$client->getTelephone()?></td>
            <td><?=$client->getAdresse()?></td>
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