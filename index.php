<?php

session_start();
?>

<header>Blog</header>
<nav>
    <ul>
        <li>
            <a href="view/inscription.php">S'inscrire</a>
        </li>
        <li>
            <a href="view/newArticle.php">Ecrire un nouvel article</a>
        </li>
        <li>
            <a href="view/memberList.php">Liste des utilisateurs</a>
        </li>
        <li>
            <a href="index.php?controller=Users&action=UsersList">liste</a>
        </li>
    </ul>
</nav>
<div></div>
<footer></footer>

<?php

$controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : NULL;
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL;

if(isset($_GET['page'])){


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
    } else {
        require "model/Articles.php";
        require "controller/ArticlesController.php";

        $showArticle = new ArticlesController();
        $showArticle->liste_articles();
}
?>