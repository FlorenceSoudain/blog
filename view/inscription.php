<?php
/**
 * Created by PhpStorm.
 * User: flore
 * Date: 02/04/2019
 * Time: 09:37
 */
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
<div>
    <form action="" method="post">
        <div class="flex">
            <h2>Inscription</h2>
            <label for="nom">Nom d'utilisateur</label>
            <input id="nom" name="nom" type="text">
            <label for="mail">E-Mail</label>
            <input id="mail" name="mail" type="email">
            <label for="password">Mot de passe</label>
            <input id="password" name="password" type="password">
            <input id="btninscription" type="submit" name="button" value="S'inscrire">
        </div>
    </form>
</div>
</body>
</html>