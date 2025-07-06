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


<div class="form-container">
        <div class="form-header">
            FORMULAIRE D'AJOUT CATEGORIE
        </div>

        <form action="/public/index.php" method="post">
            <input type="hidden" name="action" value="create">
            <input type="hidden" name="controller" value="categorie"/>
            <label for="image">Image</label>
            <input type="file" id="image" name="image">

            <label for="libelle">Libelle</label>
            <input type="text" id="libelle" name="libelle" placeholder="XXXXXXXXXXX" 
                                class="form-control"
                                value="<?php echo $data['libelle']??'' ?>">
            <small id="helpId" class="form-text text-danger"><?php echo $erreurs['libelle']??''?></small>

            <label for="qteStock">Qte Stock</label>
            <input type="number" id="qteStock" name="qteStock" value="<?php echo $data['qteStock']??'' ?>>

            <label for="prix">Prix Appro</label>
            <input type="number" id="prix" name="prixAchat" value="<?php echo $data['prixAchat']??'' ?>>

            <label for="categorie">Select a Categorie</label>
            <select id="categorie" name="categorie">
                <option value="0" selected>Choose an categorie</option>
                <?php foreach ($categories as $categorie) :?>
                    <option <?php  echo  isset($data['categorie']) && $categorie->getId()== $data['categorie']?'selected':'' ?> value="<?php echo $categorie->getId(); ?>"><?php echo $categorie->getLibelle(); ?></option>
                <?php endforeach?>
            </select>
            <small id="helpId" class="form-text text-danger"><?php echo $erreurs['categorie']??''?></small>

            <button type="submit">Save</button>
        </form>
    </div>