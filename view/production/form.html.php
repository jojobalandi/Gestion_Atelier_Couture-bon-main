<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? "Atelier Couture" ?></title>
    <link rel="stylesheet" href="/public/css/prod.css">
</head>

<div class="top-bar">
    <a href="/public/index.php?controller=compte&action=form"><button class="add-btn">Ajouter</button></a>
</div>

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
        FORMULAIRE D'APPROVISIONNEMENT
    </div>

    <form>
        <label for="observation">Observation</label>
        <input type="text" id="observation" name="observation">

        <div class="form-row">
            <div class="form-group">
                <label for="article">Articles</label>
                <select id="article" name="article">
                    <option value="">Choose an article</option>
                    <option value="jeans">Pantalon Jean's</option>
                    <option value="tshirt">T-Shirt</option>
                </select>
            </div>

            <div class="form-group">
                <label for="qte">Qte Produite</label>
                <input type="number" id="qte" name="qte">
            </div>

            <div class="form-group">
                <label>&nbsp;</label>
                <button type="button" class="add-btn">Add</button>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ARTICLE</th>
                    <th>QTE</th>
                    <th>OBSERVATION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pantalon Jean's</td>
                    <td>10</td>
                    <td>Patalon Enfant 7 ans</td>
                </tr>
            </tbody>
        </table>

        <button type="submit" class="save-btn">Save</button>
    </form>
</div>