<?php


class ArticlesController
{
    private $model;

    public function __construct()
    {
        $this->model = new Articles();
    }

    public function liste_articles()
    {
        $listes = $this->model->listeArticles();
        include "view/listeArticles.php";
    }

    public function create()
    {
        $create = $this->model->create();
        include "view/newArticle.php";
    }

    public function selectionArticle()
    {
        $article = $this->model->getOneArticle();
        include "view/article.php";
    }

    public function commCreate()
    {
        $commCreate = $this->model->createCommentaire();
        include "view/article.php";
    }

    public function modifierArticle()
    {
        $modifier = $this->model->modifierArticle();
        $valeurs = $this->model->getOneArticle();
        include "view/modifier.php";
    }

    public function supprimerArticle()
    {
        $supprimer = $this->model->supprimerArticle();

        include "view/article.php";
    }
}