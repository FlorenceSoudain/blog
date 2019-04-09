<?php
$n = $_REQUEST['n'];
$_SESSION['nom'] = isset($_SESSION['nom']) ? $_SESSION['nom'] : NULL;

?>
<h2><?php echo $article[$n - 1]['1'] ?></h2>
<span>Publié le <?php echo $article[$n - 1]['2'] ?></span>
<span>
    <?php if($_SESSION['statut'] == 'administrateur'){ ?>
     - <a href="index.php?controller=modifierArticle&n=<?php echo $article[$n - 1]['0'] ?>">Modifier</a>
    <a href="index.php?controller=supprimerArticle&n=<?php echo $article[$n - 1]['0'] ?>">Supprimer</a>
    <?php } ?>
</span>
<p><?php echo $article[$n - 1]['3'] ?></p>
<br><br><br><br>
<?php if($_SESSION['id']){ ?>
<div id="commentaire">
    <h3>Commentaires</h3>
    <form action="index.php?controller=commentairesCreate&n=<?php echo $article[$n - 1]['0']; ?>" method="post">
        <label for="message">Message</label>
        <textarea id="message" name="message"></textarea>
        <input id="btnNewCommentaire" type="submit" name="button" value="Envoyer">
    </form>
</div>
<?php } else { ?>
<span>Connectez-vous pour poster un commentaire.</span>
<?php }
var_dump($commentaires);
foreach ($commentaires as $commentaire){?>
<div><?php echo $commentaire->contenu; ?></div>
<?php }
