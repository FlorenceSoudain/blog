<?php

?>

<header></header>
<nav>
    <ul>
        <li>
            <a href="view/inscription.php">S'inscrire</a>
        </li>
        <li>
            <a>Nouveau billet</a>
        </li>
        <li>
            <a href="view/memberList.php">Liste des utilisateurs</a>
        </li>
    </ul>
</nav>
<footer></footer>

<?php

$controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : NULL;
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL;

switch($controller)
{
    case "users":
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
}