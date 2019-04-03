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
        $listes = $this->model->getAllArticles();
        include "view/listeArticles.php";
    }

    public function create()
    {
        $create = $this->model->create();
        include "view/newArticle.php";
    }
}