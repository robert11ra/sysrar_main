<?php
session_start();
require_once "../conection.php";


class Payroll
{
    private $_db;

    public function __construct()
    {
        $this->_db = new Conection();
        $this->_db->conect();
    }

    public function obtener_salarios_empleados()
    {
        //Estructura cuando no se reciben datos
        try {
            // Consulta SQL para obtener los usuarios que no esten eliminados

            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT es.id, u.name, u.email, u.id_rol, r.name as rol, u.salary, es.type_salary, es.total_salary, u.department, s.name AS status, es.id_status, es.period FROM employees_salaries es LEFT JOIN users u ON u.id = es.id_user LEFT JOIN roles r ON r.id = u.id_rol LEFT JOIN statuses s ON s.id = es.id_status LEFT JOIN comissions c ON c.id_user = u.id WHERE u.id_status != 3 GROUP BY es.id_user;");

            // Ejecutar la consulta
            $sql->execute();

            // Obtener los resultados
            $usuarios = $sql->fetchAll(PDO::FETCH_ASSOC);

            // Cerrar la conexión


            // Devolver los clientes
            return $usuarios;
        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los usuarios: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function obtener_detalles_nomina($id)
    {
        //Estructura cuando no se reciben datos
        try {
            // Consulta SQL para obtener los usuarios que no esten eliminados

            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT b.id, b.type_sale AS mayor_detal, c.comission, c.comission_total, u.name, c.id_status AS estado_comision, es.id_status AS pago_nomina, u.salary, SUM(CASE WHEN c.id_status = 2 THEN c.comission_total ELSE 0 END) OVER() AS suma_total_comisiones, es.total_salary FROM bills b LEFT JOIN comissions c ON c.id_bill = b.id LEFT JOIN employees_salaries es ON es.id_user = c.id_user LEFT JOIN users u ON u.id = c.id_user WHERE c.id_user = (SELECT id_user FROM employees_salaries WHERE id = ?) AND b.id_status = 4;");

            // Ejecutar la consulta
            $sql->execute([$id]);

            // Obtener los resultados
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            // Cerrar la conexión


            // Devolver los clientes
            return $result;
        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los usuarios: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function pagar_nomina_empleado($id)
    {
        //Estructura cuando no se reciben datos
        try {
            // Consulta SQL para obtener los usuarios que no esten eliminados

            // Preparar la consulta
            $sql = $this->_db->conection->prepare("UPDATE employees_salaries SET id_status = '4' WHERE id = ?;");

            // Ejecutar la consulta
            $sql->execute([$id]);

            // Devolver los clientes
            return $sql;
        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los usuarios: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }
}
