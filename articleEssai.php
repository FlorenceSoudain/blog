<?php

require "model/Articles.php";
$article = new Articles();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvel Article</title>
</head>
<body>
<div>
    <h1><?php echo $article->getTitre() ?></h1>
    <span><?php echo $article->getDate() ?></span>
    <div><?php echo $article->getContenu() ?></div>
</div>
</body>
</html>