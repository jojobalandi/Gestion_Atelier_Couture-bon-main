
<?php   
 $erreurs=[];
 $data=[];
if(isset($_SESSION['erreurs'])){
    $erreurs=$_SESSION['erreurs'];
    $data=$_SESSION['data'];
    unset($_SESSION['erreurs']);
    unset($_SESSION['data']);
   
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? "Atelier Couture" ?></title>
    <link rel="stylesheet" href="/public/css/fournisseur_list.css">
</head>

<div class="form-container">
        <div class="form-header">
            AJOUT FOURNISSEUR
        </div>

        <form action="/public/index.php" method="post">
            <input type="hidden" name="action" value="create">
            <input type="hidden" name="controller" value="fournisseur"/>
            <label for="photo">Image</label>
            <input type="file" id="photo" name="photo">

            <label for="tel">Fournisseur Numero</label>
            <input type="number" id="tel" name="tel" placeholder="XXXXXXXXXXX" value="<?php echo $data['tel']??'' ?>" >
            <small id="helpId" class="form-text text-danger"><?php echo $erreurs['numero']??''?></small>

            <label for="telFixe">Fournisseur Numero Fixe</label>
            <input type="number" id="telFixe" name="telFixe" placeholder="XXXXXXXXXXX"  value="<?php echo $data['telFixe']??'' ?>" >
            <small id="helpId" class="form-text text-danger"><?php echo $erreurs['telFixe']??''?></small>

            <label for="nom">Fournisseur Nom</label>
            <input type="text" id="nom" name="nom" value="<?php echo $data['nom']??'' ?>" >

            <label for="prenom">Fournisseur prenom</label>
            <input type="text" id="prenom" name="prenom"  value="<?php echo $data['prenom']??'' ?>">

            <label for="adresse">Fournisseur Adresse</label>
            <input type="text" id="adresse" name="adresse"  value="<?php echo $data['prenom']??'' ?>">

            <!--  -->

            <button type="submit">Save</button>
        </form>
    </div>