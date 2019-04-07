<?php


class Articles
{
    protected $db;
    private $id;
    private $titre;
    private $contenu;
    private $idUsers;
    private $click;
    private $dateCrea;

    private $IDArticle;

    private $message;
    private $nom;

    private $userLists;

    public function __construct()
    {
        /*$this->db = new mysqli("localhost", "root", "", "evalPHP");*/
        $this->db = new mysqli("localhost", "id7331131_root", "SQEX10177kh", "id7331131_evalphp");
        if($this->db->connect_errno)
        {
            echo "Echec lors de la connexion à la base de donnée : (" . $this->db->connect_errno . ") " . $this->db->connect_error;
        }

        $this->click = isset($_REQUEST['button']);
        $this->titre = filter_var(isset($_REQUEST['titre']) ? $_REQUEST['titre'] : NULL, FILTER_SANITIZE_STRING);
        $this->contenu = filter_var(isset($_REQUEST['contenu']) ? $_REQUEST['contenu'] : NULL, FILTER_SANITIZE_STRING);
        $this->idUsers = "1";

        $this->message = filter_var(isset($_REQUEST['message']) ? $_REQUEST['message'] : NULL, FILTER_SANITIZE_STRING);
        $this->nom = isset($_SESSION['nom']);

        $this->IDArticle = isset($_GET['article']);

        $this->n = isset($_GET['n']);
    }

    public function create()
    {
        if($this->click == TRUE)
        {
            $stmt = $this->db->prepare("INSERT INTO articles VALUES(?,?,now(),?,?)");
            $stmt->bind_param('isss', $this->id, $this->titre, $this->contenu, $this->idUsers);
            if($stmt->execute())
            {
                header("Location: index.php?controller=listeArticle");
            } else {
                echo "Echec de l'envoi de l'article.";
            }
            $stmt->close();
        }
    }

    public function listeArticles()
    {
        $this->userLists = $this->db->query("SELECT id, titre, DATE_FORMAT(date_creation, '%d/%m/%Y'), contenu, id_users FROM articles ORDER BY date_creation DESC ")->fetch_all();
        return $this->userLists;
    }

    public function getOneArticle()
    {
        $this->userLists = $this->db->query("SELECT id, titre, DATE_FORMAT(date_creation, '%d/%m/%Y'), contenu, id_users FROM articles")->fetch_all();
        return $this->userLists;
    }

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