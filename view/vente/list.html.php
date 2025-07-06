<h2>Liste des ventes</h2>

<a class="add-btn" href=../../public/index.php?controller=vente&action=form">Nouvelle vente</a>
<link rel="stylesheet" href="/public/css/vente.css">


<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Date</th>
        <th>Client</th>
        <th>Article</th>
        <th>Quantité</th>
    </tr>
    </thead>
    <tbody>
    <?php if (empty($ventes)): ?>
        <tr><td colspan="5">Aucune vente.</td></tr>
    <?php else: foreach ($ventes as $v): ?>
        <tr>
            <td><?= $v['id'] ?></td>
            <td><?= $v['dateVente'] ?></td>
            <td><?= htmlspecialchars($v['client']) ?></td>
            <td><?= htmlspecialchars($v['article']) ?></td>
            <td><?= $v['quantite'] ?></td>
        </tr>
    <?php endforeach; endif; ?>
    </tbody>
</table>
