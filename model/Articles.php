<?php


class Articles
{
    protected $db;
    private $id;
    private $titre;
    private $contenu;
    private $click;
    private $dateCrea;

    private $IDArticle;

    private $message;
    private $nom;

    private $userLists;

    public function __construct()
    {
        //Connection à la base de donnée
        $this->db = new mysqli("localhost", "root", "", "evalPHP");
        /*$this->db = new mysqli("localhost", "id7331131_root", "mmm000", "id7331131_evalphp");*/
        if($this->db->connect_errno)
        {
            echo "Echec lors de la connexion à la base de donnée : (" . $this->db->connect_errno . ") " . $this->db->connect_error;
        }

        //Récupération des données envoyé par les formulaires
        $this->click = isset($_REQUEST['button']);
        $this->titre = filter_var(isset($_REQUEST['titre']) ? $_REQUEST['titre'] : NULL, FILTER_SANITIZE_STRING);
        $this->contenu = filter_var(isset($_REQUEST['contenu']) ? $_REQUEST['contenu'] : NULL, FILTER_SANITIZE_STRING);

        $this->message = filter_var(isset($_REQUEST['message']) ? $_REQUEST['message'] : NULL, FILTER_SANITIZE_STRING);
        $this->nom = isset($_SESSION['nom']);

        $this->IDArticle = isset($_GET['article']);

        $this->n = isset($_REQUEST['n']) ? $_REQUEST['n'] : NULL;
    }

    //Fonction pour créer un nouvel article
    public function create()
    {
        if($this->click == TRUE)
        {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $stmt = $this->db->prepare("INSERT INTO articles VALUES(?,?,now(),?)");
            $stmt->bind_param('iss', $this->id, $this->titre, $this->contenu);
            if($stmt->execute())
            {
                header("Location: index.php?controller=listeArticle");
            } else {
                echo "Echec de l'envoi de l'article.";
            }
            $stmt->close();
        }
    }

    //Fonction pour lister les articles
    public function listeArticles()
    {
        $this->userLists = $this->db->query("SELECT id, titre, DATE_FORMAT(date_creation, '%d/%m/%Y'), contenu FROM articles ORDER BY date_creation DESC ")->fetch_all();
        return $this->userLists;
    }

    //Fonction pour sélectionner un article
    public function getOneArticle()
    {
        $this->userLists = $this->db->query("SELECT id, titre, DATE_FORMAT(date_creation, '%d/%m/%Y'), contenu FROM articles")->fetch_all();
        return $this->userLists;
    }

    //Fonction pour modifier un article
    public function modifierArticle()
    {
        if($this->click == TRUE)
        {
            $stmt = $this->db->prepare("UPDATE articles SET id = ?,
           `titre` = ?,
           `contenu` = ?
           WHERE id = '$this->n'");
        $stmt->bind_param('iss',
            $this->n,
            $this->titre,
            $this->contenu);
            if($stmt->execute())
            {
                header("Location: index.php?controller=listeArticle");
            }
            $stmt->close();
        }
    }

    //Fonction pour supprimer un article
    public function supprimerArticle()
    {
            $stmt = $this->db->prepare("DELETE FROM `articles` WHERE id = '$this->n'");
            if($stmt->execute())
            {
                header("Location: index.php?controller=listeArticle");
            } else {
                echo "Echec de la suppression de l'article.";
            }
            $stmt->close();

    }
}