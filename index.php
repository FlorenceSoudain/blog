<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon blog</title>
</head>
<body>
<header>
    <h1>Blog</h1>
</header>
<nav>
    <ul>
        <li>
            <a href="index.php">Accueil</a>
        </li>
        <li>
            <a href="index.php?controller=articleCreate">Créer un nouvel article</a>
        </li>
    </ul>
</nav>
<div>
<?php

session_start();
if(!isset($_REQUEST['controller']))
{
    $controller = 'liste';
} else {
    $controller = $_REQUEST['controller'];
}
$action = !isset($_GET['action']);
switch ($controller)
{
    case "liste":
        require "model/Articles.php";
        require "controller/ArticlesController.php";

        $liste = new ArticlesController();
        $liste->liste_articles();
        break;
    case "articleCreate":
        require "model/Articles.php";
        require "controller/ArticlesController.php";

        $newArticle = new ArticlesController();
        $newArticle->create();
        break;
    case"inscription":
        require "model/Users.php";
        require "controller/UsersController.php";

        $inscription = new UsersController();
        $inscription->UserCreate();
}
?>

</div>
<div>
    <a href="index.php?controller=inscription">S'inscrire</a>
</div>
</body>
</html>
<?php
/*
$controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : NULL;
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL;
    switch($controller)
    {
        case "Users":
            require "model/Users.php";
            require "controller/UsersController.php";

            $ctrl = new UsersController();

            switch($action)
            {
                case"UserCreate":
                    $ctrl->UserCreate();
                    break;
                case "UsersList":
                    $ctrl->UsersList();
                    break;
            }
            break;

        case "Articles":
            require "model/Articles.php";
            require "controller/ArticlesController.php";

            $ctrl = new ArticlesController();

            switch($action)
            {
                case"getAllArticles":
                    $ctrl->liste_articles();
                    break;
            }
            break;
}
?>*/