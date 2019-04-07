<?php


class Commentaires
{
    private $db;
    private $id;
    private $message;
    private $nom;
    private $idArticle;
    private $click;

    private $IDArticle;


    private $commentaires;

    public function __construct()
    {
        /*$this->db = new mysqli("localhost", "root", "", "evalPHP");*/
        $this->db = new mysqli("localhost", "id7331131_root", "SQEX10177kh", "id7331131_evalphp");
        if($this->db->connect_errno)
        {
            echo "Echec lors de la connexion à la base de donnée : (" . $this->db->connect_errno . ") " . $this->db->connect_error;
        }

        $this->click = isset($_REQUEST['button']);
        $this->message = filter_var(isset($_REQUEST['message']) ? $_REQUEST['message'] : NULL, FILTER_SANITIZE_STRING);
        $this->nom = "essai";
        $this->IDArticle = 1;

    }

    public function essai()
    {
        return $this->idArticle;
    }
    public function ajoutCommentaire()
    {
        if($this->click == TRUE)
        {
            $stmt = $this->db-> prepare("INSERT INTO commentaires (id, nom, message, date_creation, id_article) VALUES (?,?,?,now()),?");
            $stmt -> bind_param('isss', $this->id, $this->nom, $this->message, $this->IDArticle);
            if($stmt -> execute()){
                header('Location: index.php');
            } else {
                echo "Echec de l'envoi";
            }
            $stmt -> close();
        }
    }

    public function getCommentaires()
    {
        $this->commentaires = $this->db->query("SELECT id, nom, message, DATE_FORMAT(date_creation, '%d/%m/%Y') FROM commentaires ORDER BY date_creation DESC ")->fetch_all();
        return $this->commentaires;
    }
}