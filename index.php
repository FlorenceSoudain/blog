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

//Annonce des sessions
$_SESSION['id'] = isset($_SESSION['id']) ? $_SESSION['id'] : NULL;
$_SESSION['statut'] = isset($_SESSION['statut']) ? $_SESSION['statut'] : NULL;

//Conditions : si l'utilisateur n'est pas connecté, affiche une solicitation à s'inscrire ou se connecter
if ($_SESSION['id'] == NULL) { ?><span>Bonjour.</span> <a href="index.php?controller=inscription">S'inscrire</a>
    <a href="index.php?controller=connection">Se connecter</a>
    <?php } else { ?>
    <div>
        <span>Bonjour, <?php echo $_SESSION['nom'] ?></span>

        <?php
        //Si la Session Statut renvoie administrateur, la page administration s'ouvre
        if($_SESSION['statut'] === 'administrateur') { ?>
            <a href="index.php?controller=afficherAdmin&n=<?php echo $_SESSION['id'] ?>">Espace-administration</a>
        <?php }
        //Si la Session Statut renvoie membre, la page membre s'ouvre
        if($_SESSION['statut'] === 'membre') { ?>
            <a href="#">Espace Membre</a>
        <?php } ?>
        <a href="index.php?controller=listeUsers">Liste</a>
        <a href="index.php?controller=deconnection">Déconnection</a>
    </div>
    <?php }

if(!isset($_REQUEST['controller']))
{
    $controller = 'listeArticle';
} else {
    $controller = $_REQUEST['controller'];
}
$action = !isset($_GET['action']);
switch ($controller) {
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
        break;
    case"afficherArticle":
        require "model/Articles.php";
        require "controller/ArticlesController.php";

        $article = new ArticlesController();
        $article->selectionArticle();
        break;
    case"afficherAdmin":
        require "model/Users.php";
        require "controller/UsersController.php";

        $administrateur = new UsersController();
        $administrateur->selectAdmin();
        break;
    case"commentairesCreate":
        require "model/Commentaires.php";
        require "controller/CommentaireController.php";

        $commentaires = new CommentaireController();
        $commentaires->commCreate();
        break;
    case"afficherCommentaire":
        require "model/Commentaires.php";
        require "controller/CommentaireController.php";

        $afficherCommentaire = new CommentaireController();
        $afficherCommentaire->afficherCommentaires();
        break;
    case"modifierArticle":
        require "model/Articles.php";
        require "controller/ArticlesController.php";

        $modifier = new ArticlesController();
        $modifier->modifierArticle();
        break;
    case"supprimerArticle":
        require "model/Articles.php";
        require "controller/ArticlesController.php";

        $supprimer = new ArticlesController();
        $supprimer->supprimerArticle();
}
?>
    </div>
    <div id="div2">
        <p>Paragraphe</p>
        <a href="index.php?controller=essai">Essai</a>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>