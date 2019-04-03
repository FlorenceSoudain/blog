<?php

include "../model/Connection.php";
session_start();
$connection = new Connection();
$connection->connect();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connection</title>
</head>
<body>
<div>
    <form action="" method="post">
        <h2>Connection</h2>
        <label for="nom">Nom d'utilisateur</label>
        <input id="nom" name="nom" type="text">
        <label for="password">Mot de passe</label>
        <input id="password" name="password" type="password">
        <input id="btnconnection" type="submit" name="button" value="Envoyer">
    </form>
</div>
</body>
</html>

