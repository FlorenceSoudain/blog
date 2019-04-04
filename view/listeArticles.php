<h2>Liste des articles</h2>
<?php
 foreach ($listes as $item) { ?>

    <ul>
        <li><a href="../index.php?article=<?php echo $item['0']?>"> <?php echo $item['1']; ?></a></li>
    </ul>
<?php }

