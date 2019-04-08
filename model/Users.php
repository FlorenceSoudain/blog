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

    private $DBID;
    private $DBNom;
    private $DBPassword;

    private $userLists;

    public function __construct()
    {
        /*$this->db = new mysqli("localhost", "root", "", "evalPHP");*/
        $this->db = new mysqli("localhost", "id7331131_root", "mmm000", "id7331131_evalphp");
        if ($this->db->connect_errno) {
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
        if ($this->click == TRUE) {
            $stmt = $this->db->prepare("INSERT INTO users VALUES (?,?,?,?,?)");
            $stmt->bind_param("issss", $this->id, $this->nom, $this->mail, sha1($this->password), $this->statut);
            if ($stmt->execute()) {
                header("Location: controller=listeArticle");
            } else {
                echo "Echec de l'inscription";
            }
            $stmt->close();
        }
    }

    public function getAllUsers()
    {
        $this->userLists = $this->db->query("SELECT * FROM users")->fetch_all();
        return $this->userLists;
    }

    public function connection()
    {
        if ($this->click == TRUE) {
            if (!empty($this->nom) AND !empty($this->password)) {
                $sql = $this->db->query("SELECT * FROM users WHERE nom = '$this->nom'")->fetch_object();
                if ($this->nom === $sql->nom && sha1($this->password) === $sql->password) {

                    echo "Connection réussi !";
                    $_SESSION['id'] = $sql->id;
                    $_SESSION['nom'] = $sql->nom;
                    $_SESSION['statut'] = $sql->statut;
                } else {
                    echo "Connection impossible";
                }
            }
        }

    }

    public function deconnection()
    {
        session_destroy();
        header('Location: index.php');
    }

    public function getOneAdmin()
    {
        $this->userLists = $this->db->query("SELECT * FROM users")->fetch_all();
        return $this->userLists;
    }

}