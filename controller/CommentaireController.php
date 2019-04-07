<?php
/**
 * Created by PhpStorm.
 * User: flore
 * Date: 06/04/2019
 * Time: 12:19
 */

class CommentaireController
{
    private $model;

    public function __construct()
    {
        $this->model = new Commentaires();
    }

    public function commCreate()
    {
        $commCreate = $this->model->ajoutCommentaire();
        include "view/articles.php";
    }

    public function afficherCommentaires()
    {
        $commentaire = $this->model->getCommentaires();
        include "view/articles.php";
    }
}