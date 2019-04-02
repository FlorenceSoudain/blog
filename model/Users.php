<?php
/**
 * Created by PhpStorm.
 * User: flore
 * Date: 02/04/2019
 * Time: 09:09
 */

class Users
{
    protected $db;
    private $id;
    private $nom;
    private $mail;
    private $statut;
    private $password;
    private $click;

    private $userLists;

    public function __construct()
    {
        $this->db = new mysqli("localhost", "root", "", "evalPHP");
        if($this->db->connect_errno)
        {
            echo "Echec lors de la connexion à la base de donnée : (" . $this->db->connect_errno . ") " . $this->db->connect_error;
        }

        $this->click = isset($_REQUEST['button']);
        $this->nom = filter_var(isset($_REQUEST['nom']) ? $_REQUEST['nom'] : NULL, FILTER_SANITIZE_STRING);
        $this->mail = filter_var(isset($_REQUEST['mail']) ? $_REQUEST['mail'] : NULL, FILTER_SANITIZE_EMAIL);
        $this->password = filter_var(isset($_REQUEST['password']) ? $_REQUEST['password'] : NULL, FILTER_SANITIZE_STRING);
        $this->statut = "membre";
    }

    public function create()
    {
        if($this->click == TRUE)
        {
            $stmt = $this->db->prepare("INSERT INTO users VALUES (?,?,?,?,?)");
            $stmt->bind_param("issss", $this->id, $this->nom, $this->mail, sha1($this->password), $this->statut);
            if($stmt->execute())
            {
                header('Location : index.php');
            } else {
                echo "Echec de l'inscription";
            }
            $stmt->close();
            return $this->getAll();
        }
    }

    public function getAll()
    {
        $result = $this->db->query("SELECT * FROM `users` WHERE 1");
        $this->userLists = $result->fetch_assoc();
        return $this->userLists;
    }
}