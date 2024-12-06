<?php
require_once "config.php";


class Conection
{
    public $conection;
    public function conect()
    {
        try {
            $db = "mysql:host=localhost;dbname=" . DB_DESA;
            $op = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            $this->conection = new PDO($db, DB_USER, DB_PASS);
            return $this->conection;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function conectout()
    {
        $this->conection = null;
    }
}
