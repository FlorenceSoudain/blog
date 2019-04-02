<?php
/**
 * Created by PhpStorm.
 * User: flore
 * Date: 02/04/2019
 * Time: 14:48
 */


?>

<h1>Liste des Utilisateurs</h1>
<ul>
    <?php foreach($MemberList as $user){ ?>
        <li>
            <?php echo $user; ?>
        </li>
    <?php } ?>
</ul>