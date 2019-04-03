<?php


class Connection
{
    protected $db;

    private $DBID;
    private $DBNom;
    private $DBPassword;

    private $id;
    private $nom;
    private $statut;
    private $password;
    private $click;


    public function __construct()
    {
        $this->db = new mysqli("localhost", "root", "", "evalphp");
        if($this->db->connect_errno)
        {
            echo "Echec lors de la connexion à la base de donnée : (" . $this->db->connect_errno . ") " . $this->db->connect_error;
        }

        $this->click = isset($_REQUEST['button']);
        $this->nom = filter_var(isset($_REQUEST['nom']) ? $_REQUEST['nom'] : NULL, FILTER_SANITIZE_STRING);
        $this->password = filter_var(isset($_REQUEST['password']) ? $_REQUEST['password'] : NULL, FILTER_SANITIZE_STRING);
    }

    public function connect()
    {
        $sql = $this->db->query("SELECT id, nom, password FROM users WHERE nom = '$this->nom'");
        while($row = $sql->fetch_assoc())
        {
            $this->DBID = $row['id'];
            $this->DBNom = $row['nom'];
            $this->DBPassword = $row['password'];
        }
        if($this->nom && $this->password)
        {
            if($this->DBNom === $this->nom && $this->DBPassword === sha1($this->password))
            {
                session_start();
                $_SESSION['id'] = $this->DBID;
                echo "connection réussi " . $_SESSION['id'];
            } else {
                echo "Erreur";
            }
        }
    }
}