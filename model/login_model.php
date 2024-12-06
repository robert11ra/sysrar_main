<?php
require_once "../conection.php";


class Login
{

    private $_db;

    public function __construct()
    {
        $this->_db = new Conection();
        $this->_db->conect();
    }

    public function login_user($user, $pass)
    {
        //Estructura cuando se reciben datos
        try {

            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT u.id, u.name, u.email, u.pass, r.name as rol FROM users u LEFT JOIN roles r ON r.id = u.id_rol WHERE u.user = ? AND u.id_status = '1'");

            // Ejecutar la consulta
            if (!$sql->execute([$user])) {
                throw new Exception("Error en la ejecucion de la consulta");
            }

            $result = $sql->fetch(PDO::FETCH_ASSOC);

            if ($sql->rowCount() === 1) {
                // Verificar la contraseña
                if (password_verify($pass, $result['pass'])) {
                    $_SESSION['active'] = true;
                    $_SESSION['id_user'] = $result['id'];
                    $_SESSION['name'] = $result['name'];
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['rol'] = $result['rol'];
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'error' => 'Credenciales incorrectas']);
                }
            } else {
                echo json_encode(['success' => false, 'error' => 'Credenciales incorrectas o Usuario inactivo']);
            }

        } catch (PDOException $e) {

            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }








    public function login_user2($user, $pass)
    {
        $sql = $this->_db->conection->prepare("SELECT * FROM users WHERE user = ? AND id_status = '1'");

        if (!$sql->execute([$user])) {
            echo json_encode(['success' => false, 'error' => 'Error en la consulta']);
            return;
        }

        $result = $sql->fetch(PDO::FETCH_ASSOC);


        if ($sql->rowCount() === 1) {
            // Verificar la contraseña
            if (password_verify($pass, $result['pass'])) {
                $_SESSION['active'] = true;
                $_SESSION['name'] = $result['name'];
                $_SESSION['email'] = $result['email'];
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Credenciales incorrectas']);
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'Credenciales incorrectas o Usuario inactivo']);
        }
    }
}
