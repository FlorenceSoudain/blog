<?php


class Commentaires
{
    private $db;
    private $message;
    private $idUser;

    public function __construct()
    {
        $this->db = new mysqli("localhost", "root", "", "evalPHP");
        /*$this->db = new mysqli("localhost", "id7331131_root", "SQEX10177kh", "id7331131_evalphp");*/
        if($this->db->connect_errno)
        {
            echo "Echec lors de la connexion à la base de donnée : (" . $this->db->connect_errno . ") " . $this->db->connect_error;
        }

        $this->click = isset($_REQUEST['button']);
        $this->message = filter_var(isset($_REQUEST['message']) ? $_REQUEST['message'] : NULL, FILTER_SANITIZE_STRING);
        $this->idUser = filter_var(isset($_REQUEST['contenu']) ? $_REQUEST['contenu'] : NULL, FILTER_SANITIZE_STRING);
    }

    public function ajoutCommentaire()
    {
        $stmt = $this->db -> prepare("INSERT INTO commentaires VALUES (?,?,?,now())");
        $stmt -> bind_param('iss', $id, $this->message, $this->idUser);
        if($stmt -> execute()){
            header('Location: index.php');
        } else {
            echo "Echec de l'envoi";
        }
        $stmt -> close();
    }
}