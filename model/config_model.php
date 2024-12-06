<?php
session_start();
require_once "../conection.php";


class Config
{
    private $_db;

    public function __construct()
    {
        $this->_db = new Conection();
        $this->_db->conect();
    }

    public function obtener_tasa()
    {
        //Estructura cuando no se reciben datos
        try {

            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT tasa_bcv, tasa_paralelo FROM configurations");

            // Ejecutar la consulta
            $sql->execute();

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

    public function obtener_dashboard()
    {
        //Estructura cuando no se reciben datos
        try {

            // Preparar la consulta
            $sql = $this->_db->conection->prepare("CALL getDashboard()");

            // Ejecutar la consulta
            $sql->execute();

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

    public function obtener_configuracion($id_user)
    {
        //Estructura cuando no se reciben datos
        try {

            // Preparar la consulta
            $sql = $this->_db->conection->prepare("CALL getConfig(?)");

            // Ejecutar la consulta
            $sql->execute([$id_user]);

            // Obtener los resultados
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            // Cerrar la conexión


            // Devolver los resultados
            return $result;
        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los usuarios: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function editar_configuracion($tickera, $tasa_bcv, $tasa_paralelo, $comission_detal, $comission_mayor, $type_comission)
    {
        //Estructura cuando se reciben datos
        try {

            //Preparar la consulta

            $sql = $this->_db->conection->prepare("UPDATE configurations SET tickera_name = ?, tasa_bcv= ?, tasa_paralelo = ?, comission_detal = ?, comission_mayor = ?, type_comission = ?");

            // Ejecutar consulta y validar exito
            $sql->execute([$tickera, $tasa_bcv, $tasa_paralelo, $comission_detal, $comission_mayor, $type_comission]);

            //Devolver resultado
            return $sql;
        } catch (PDOException $e) {

            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error

        }
    }

    public function editar_configuracion_empresa($rif, $company_name, $company_email, $company_address, $company_phone)
    {
        //Estructura cuando se reciben datos
        try {

            //Preparar la consulta

            $sql = $this->_db->conection->prepare("UPDATE configurations SET rif = ? , company_name= ?, company_email= ?, company_address= ?, company_phone= ?");

            // Ejecutar consulta y validar exito
            $sql->execute([$rif, $company_name, $company_email, $company_address, $company_phone]);

            //Devolver resultado
            return $sql;
        } catch (PDOException $e) {

            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error

        }
    }
    

}
