<h2>Liste des articles</h2>
<?php
 foreach ($listes as $item) { ?>

    <ul>
        <li><strong><a href="index.php?controller=afficherArticle&n=<?php echo $item['0']?>"> <?php echo $item['1']; ?></a></strong> (<?php echo $item['2']; ?>)</li>
    </ul>
<?php }
