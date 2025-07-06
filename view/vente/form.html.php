<h2>Nouvelle vente</h2>

<?php

$erreurs = $_SESSION['erreurs'] ?? [];
$data = $_SESSION['data'] ?? [];
unset($_SESSION['erreurs']);
unset($_SESSION['data']);
?>

<?php if (!empty($erreurs)): ?>
    <div class="error-message">
        <?php foreach ($erreurs as $err): ?>
            <p><?= htmlspecialchars($err) ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>


<form action="<?= BASE_URL ?>public/index.php?controller=vente&action=create" method="post">
    <label for="client">Client :</label>
    <select name="client" id="client" required>
        <option value="">-- Sélectionner --</option>
        <?php foreach ($clients as $c): ?>
            <option value="<?= htmlspecialchars($c->getId()) ?>"
                <?= (isset($data['client']) && $data['client'] == $c->getId()) ? 'selected' : '' ?>>
                <?= htmlspecialchars($c->getNom()) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <?php if (!empty($erreurs['client'])): ?>
        <small class="form-text text-danger error-message"><?= htmlspecialchars($erreurs['client']) ?></small>
    <?php endif; ?>

    <label for="article">Article :</label>
    <select name="article" id="article" required>
        <option value="">-- Sélectionner --</option>
        <?php foreach ($articles as $a): ?>
            <option value="<?= htmlspecialchars($a->getId()) ?>"
                <?= (isset($data['article']) && $data['article'] == $a->getId()) ? 'selected' : '' ?>>
                <?= htmlspecialchars($a->getLibelle()) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <?php if (!empty($erreurs['article'])): ?>
        <small class="form-text text-danger error-message"><?= htmlspecialchars($erreurs['article']) ?></small>
    <?php endif; ?>

    <label for="quantite">Quantité :</label>
    <input type="number" name="quantite" id="quantite" min="1" required
           value="<?= htmlspecialchars($data['quantite'] ?? '') ?>">
    <?php if (!empty($erreurs['quantite'])): ?>
        <small class="form-text text-danger error-message"><?= htmlspecialchars($erreurs['quantite']) ?></small>
    <?php endif; ?>

    <button type="submit">Enregistrer</button>
</form>