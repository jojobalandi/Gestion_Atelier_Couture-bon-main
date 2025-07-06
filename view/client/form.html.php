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
            FORMULAIRE D'AJOUT D'ARTICLE
        </div>

        <form action="/public/index.php" method="post">
            <input type="hidden" name="action" value="create">
            <input type="hidden" name="controller" value="client"/>
            <label for="photo">Image</label>
            <input type="file" id="photo" name="photo">

            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" placeholder="XXXXXXXXXXX" value="<?php echo $data['nom']??'' ?>">
            <small id="helpId" class="form-text text-danger"><?php echo $erreurs['nom']??''?></small>

            <label for="prenom">Prenom</label>
            <input type="text" id="prenom" name="prenom" placeholder="XXXXXXXXXXX" value="<?php echo $data['prenom']??'' ?>">
            <small id="helpId" class="form-text text-danger"><?php echo $erreurs['prenom']??''?></small> 
            
            
            <label for="adresse">Adresse</label>
            <input type="text" id="adresse" name="adresse" placeholder="XXXXXXXXXXX"  value="<?php echo $data['adresse']??'' ?>">
            <small id="helpId" class="form-text text-danger"><?php echo $erreurs['adresse']??''?></small> 

            <label for="telephone">Telepone</label>
            <input type="text" id="telephone" name="telephone" placeholder="XXXXXXXXXXX"  value="<?php echo $data['telephone']??'' ?>">
            <small id="helpId" class="form-text text-danger"><?php echo $erreurs['telephone']??''?></small> 

            <label for="observation">Oservation</label>
            <input type="text" id="observation" name="observation" placeholder="XXXXXXXXXXX"  value="<?php echo $data['observation']??'' ?>">
            <small id="helpId" class="form-text text-danger"><?php echo $erreurs['observation']??''?></small> 


            <button type="submit">Save</button>
        </form>
    </div>