<?php
/**
 * Created by PhpStorm.
 * User: flore
 * Date: 02/04/2019
 * Time: 14:48
 */

/*require "../model/Users.php";
$membres = new Users();
$membres->getAll();*/
?>

<h1>Liste des Utilisateurs</h1>
<ul>
    <?php foreach($Liste as $user){ ?>
        <li>
            <?php echo $user; ?>
        </li>
    <?php } ?>
</ul>