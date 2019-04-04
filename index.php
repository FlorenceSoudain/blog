<?php
session_start();

?>
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon blog</title>
    <link rel="stylesheet" href="style.css">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
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
<div id="container">
    <div id="float">
<?php
$_SESSION['id'] = isset($_SESSION['id']) ? $_SESSION['id'] : NULL;
if ($_SESSION['id'] == NULL) {
    echo "Bonjour";
} else {
    echo "Bonjour " . $_SESSION['nom'];
}

if(!isset($_REQUEST['controller']))
{
    $controller = 'listeArticle';
} else {
    $controller = $_REQUEST['controller'];
}
$action = !isset($_GET['action']);
switch ($controller)
{
    case "listeArticle":
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
        break;
    case"listeUsers":
        require "model/Users.php";
        require "controller/UsersController.php";

        $listeUsers = new UsersController();
        $listeUsers->UsersList();
        break;
    case"connection":
        require "model/Users.php";
        require "controller/UsersController.php";

        $connection = new UsersController();
        $connection->UserConnect();
        break;
    case"deconnection":
        require "model/Users.php";
        require "controller/UsersController.php";

        $deconnection = new UsersController();
        $deconnection->Deconnect();
}

if(isset($_REQUEST['article']))
{
    $article = $_REQUEST['article'];
}
?>
    </div>
    <div id="div2">
        <p>Paragraphe</p>
    </div>
</div>
<div>
    <a href="index.php?controller=inscription">S'inscrire</a>
    <a href="index.php?controller=connection">Se connecter</a>
    <a href="index.php?controller=listeUsers">Liste</a>
    <a href="index.php?controller=deconnection">Déconnection</a>
</div>
</body>
</html>
<?php