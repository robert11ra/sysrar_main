<?php
session_start();
require_once "../conection.php";


class Income
{
    private $_db;

    public function __construct()
    {
        $this->_db = new Conection();
        $this->_db->conect();
    }

    public function obtener_ingresos($start_formated, $end_formated)
    {
        //Estructura cuando no se reciben datos
        try {

            // Preparar la consulta
            $sql = $this->_db->conection->prepare("CALL getIncome(?,?)");

            // Ejecutar la consulta
            $sql->execute([$start_formated, $end_formated]);

            // Obtener los resultados
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            // Devolver los resultados
            return $result;

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los datos: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }
}
