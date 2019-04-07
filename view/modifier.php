<?php
/**
 * Created by PhpStorm.
 * User: flore
 * Date: 07/04/2019
 * Time: 11:51
 */

$n = $_REQUEST['n'];
$_SESSION['nom'] = isset($_SESSION['nom']) ? $_SESSION['nom'] : NULL;
?>
<h2>Modifier un article</h2>
    <form action="" method="post">
        <label for="titre">Titre</label>
        <input id="titre" name="titre" type="text" value="<?php echo $valeurs[$n - 1]['1']; ?>">
        <label for="contenu">Contenu</label>
        <textarea id="contenu" name="contenu"><?php echo $valeurs[$n - 1]['3']; ?></textarea>
        <input id="btnNewArticle" type="submit" name="button" value="Envoyer">
    </form>
