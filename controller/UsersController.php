<?php
/**
 * Created by PhpStorm.
 * User: flore
 * Date: 02/04/2019
 * Time: 09:19
 */

class UsersController
{
    private $model;

    public function __construct()
    {
        $this->model = new Users();
    }

    public function UserCreate()
    {
        $UserCreate = $this->model->create();
        include "view/inscription.php";
    }

    public function UserConnect()
    {
        $UserConnect = $this->model->connection();
        include "view/connection.php";
    }

    public function UsersList()
    {
        $Liste = $this->model->getAllUsers();
        include "view/usersList.php";
    }

    public function Deconnect()
    {
        $Deconnection = $this->model->deconnection();
        include "view/listeArticles.php";
    }

    public function selectAdmin()
    {
        $administrateur = $this->model->getOneAdmin();
        include "view/admin.php";
    }


}