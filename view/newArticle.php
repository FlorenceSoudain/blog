<?php

include "../model/Articles.php";
$articles = new articles();
$articles->create();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvel Article</title>
</head>
<body>
<div>
    <form action="" method="post">
        <h2>Nouvel Article</h2>
        <label for="titre">Titre</label>
        <input id="titre" name="titre" type="text">
        <label for="contenu">Contenu</label>
        <textarea id="contenu" name="contenu"></textarea>
        <input id="btnNewArticle" type="submit" name="button" value="Envoyer">
    </form>
</div>
</body>
</html>