<?php
session_start();
require_once "../config.php";
require_once "../model/login_model.php";


class LoginController
{

    public function loginUser($user, $pass)
    {

        $login = new Login();
        $login->login_user($user, $pass);
    }
}

// Si se recibe una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['user']);
    $pass = trim($_POST['password']);

    $login = new LoginController();
    $login->loginUser($user, $pass);
}
