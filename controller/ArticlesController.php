<?php


class ArticlesController
{
    private $model;

    public function __construct()
    {
        $this->model = new Articles();
    }

    //Renvoie la liste des articles à l'index
    public function liste_articles()
    {
        $listes = $this->model->listeArticles();
        include "view/listeArticles.php";
    }

    //Récupére les données du formulaire pour ajouter un nouvel article à la base de donnée
    public function create()
    {
        $create = $this->model->create();
        include "view/newArticle.php";
    }

    //Envoie un article
    public function selectionArticle()
    {
        $article = $this->model->getOneArticle();
        include "view/article.php";
    }

    //Modifie un article
    public function modifierArticle()
    {
        $modifier = $this->model->modifierArticle();
        $valeurs = $this->model->getOneArticle();
        include "view/modifier.php";
    }

    //Supprime un article
    public function supprimerArticle()
    {
        $supprimer = $this->model->supprimerArticle();
        include "view/article.php";
    }
}