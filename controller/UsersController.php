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

    public function UsersList()
    {
        $Liste = $this->model->getAll();
        include "view/usersList.php";
    }
}