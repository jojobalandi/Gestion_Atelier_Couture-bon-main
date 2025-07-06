<?php
$erreurs=[];
$data=[];
if(isset($_SESSION['erreurs'])){
    $erreurs=$_SESSION['erreurs'];
    $data=$_SESSION['data'];
    unset($_SESSION['erreurs']);
    unset($_SESSION['data']);
}
// CES VARIABLES SONT MAINTENANT DÉFINIES PAR LE CONTRÔLEUR DANS $this->renderView()
// et seront disponibles ici. Il n'est pas nécessaire de les initialiser à nouveau,
// mais si votre IDE ne le détecte pas, vous pouvez ajouter des commentaires ou
// des initialisations par défaut pour aider l'autocomplétion (ne pas les laisser en prod).
// ex: /** @var array $fournisseurs */
// ex: /** @var array $articleConfections */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>

</head>
<body>

<div class="form-container">
    <div class="form-header">
        FORMULAIRE D'APPROVISIONNEMENT
    </div>

    <form action="/public/index.php?controller=approvisionnement&action=create" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group">
                <label for="fournisseur">Fournisseur</label>
                <select id="fournisseur" name="fournisseur">
                    <option value="0" selected>Choose a fournisseur</option>
                    <?php
                    if (isset($fournisseurs) && is_array($fournisseurs)) : ?>
                        <?php foreach ($fournisseurs as $fournisseur) :?>
                            <option <?php
                            echo  (isset($data['fournisseur']) && $fournisseur->getId()== $data['fournisseur']) ? 'selected' : '';
                            ?> value="<?php echo $fournisseur->getId(); ?>">
                                <?php echo $fournisseur->getLibelle(); ?>
                            </option>
                        <?php endforeach?>
                    <?php endif; ?>
                </select>
                <small id="helpIdFournisseur" class="form-text text-danger"><?php echo $erreurs['fournisseur']??''?></small>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="articleconfection_select">Articles</label>
                <select id="articleconfection_select" name="articleConfection"> <option value="0" selected>Choose an article</option>
                    <?php
                    if (isset($articleConfections) && is_array($articleConfections)) : ?>
                        <?php foreach ($articleConfections as $articleConfection) :?>
                            <option <?php
                            echo  (isset($data['articleConfection']) && $articleConfection->getId()== $data['articleConfection']) ? 'selected' : '';
                            ?> value="<?php echo $articleConfection->getId(); ?>">
                                <?php echo $articleConfection->getLibelle(); ?>
                            </option>
                        <?php endforeach?>
                    <?php endif; ?>
                </select>
                <small id="helpIdArticleConfection" class="form-text text-danger"><?php echo $erreurs['articleConfection']??''?></small>
            </div>

            <div class="form-group">
                <label for="qteStock">Qte Appro</label>
                <input type="number" id="qteStock" name="qteStock"  value="<?php echo $data['qteStock']??'' ?>"  >
                <small id="helpIdQteStock" class="form-text text-danger"><?php echo $erreurs['qteStock']??''?></small>
            </div>

            <div class="form-group">
                <label>&nbsp;</label>
                <button type="button" class="add-btn">Add</button>
            </div>
        </div>

        <button type="submit" class="save-btn">Save</button>
    </form>
</div>
</body>
</html>