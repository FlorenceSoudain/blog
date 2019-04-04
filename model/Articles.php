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

    private $userLists;

    public function __construct()
    {
        $this->db = new mysqli("localhost", "root", "", "evalPHP");
        /*$this->db = new mysqli("localhost", "id7331131_root", "SQEX10177kh", "id7331131_evalphp");*/
        if($this->db->connect_errno)
        {
            echo "Echec lors de la connexion à la base de donnée : (" . $this->db->connect_errno . ") " . $this->db->connect_error;
        }

        $this->click = isset($_REQUEST['button']);
        $this->titre = filter_var(isset($_REQUEST['titre']) ? $_REQUEST['titre'] : NULL, FILTER_SANITIZE_STRING);
        $this->contenu = filter_var(isset($_REQUEST['contenu']) ? $_REQUEST['contenu'] : NULL, FILTER_SANITIZE_STRING);
        $this->idUsers = "1";
    }

    public function create()
    {
        if($this->click == TRUE)
        {
            $stmt = $this->db->prepare("INSERT INTO articles VALUES(?,?,now(),?,?)");
            $stmt->bind_param('isss', $this->id, $this->titre, $this->contenu, $this->idUsers);
            if($stmt->execute())
            {
                header("Location: index.php");
            } else {
                echo "Echec de l'envoi de l'article.";
            }
            $stmt->close();
        }
    }
    public function getTitre()
    {
        $sql = $this->db->query("SELECT titre FROM articles");
        while($row = $sql->fetch_assoc())
        {
            $this->titre = $row['titre'];
        }
        return $this->titre;
    }

    public function getContenu()
    {
        $sql = $this->db->query("SELECT contenu FROM articles");
        while($row = $sql->fetch_assoc())
        {
            $this->contenu = $row['contenu'];
        }
        return $this->contenu;
    }

    public function getDate()
    {
        $sql = $this->db->query("SELECT date_creation FROM articles");
        while($row = $sql->fetch_assoc())
        {
            $this->dateCrea = $row['date_creation'];
        }
        return $this->dateCrea;
    }

    public function getAllArticles()
    {
        $this->userLists = $this->db->query("SELECT * FROM articles")->fetch_all();
        return $this->userLists;
    }
    public function getOneArticle()
    {
        $this->userLists = $this->db->query("SELECT * FROM articles")->fetch_all();
        return $this->userLists;
    }
}