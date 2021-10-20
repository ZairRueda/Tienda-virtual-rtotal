<?php 

namespace Controllers;

use MVC\Router;
use Model\Log;

class LoginController {

    public static function login( Router $router ) {
        
        $errores = [];

        $resultado = $_GET['resultado'] ?? null;

        $email = '';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $auth = new Log($_POST);

            $errores = $auth->validar();

            if (empty($errores)) {

                $existe = $auth->existeUsuario(); 

                // debuguear($existe);
                if (!$existe) {

                    $errores = Log::getErrores();

                } else {

                    $autenticado = $auth->comprobarPassword($existe);

                    if ($autenticado) {
                        // autenticar el usuario
                        $auth->autenticar();

                    } else {
                        // Password incorrecto
                        $errores = Log::getErrores();

                    }
                }
            }
        }


        $router->render('auth/login', [
            'errores' => $errores,
            'resultado' => $resultado
        ]);

    }

    public static function registro( Router $router ) {
        
        $errores = [];

        $usuario = '';
        $email = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $auth = new Log($_POST);

            $errores = $auth->validar();


        
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
        
            if (empty($errores)) {
        
                $usuarioExist = $auth->existe();

                if (!$usuarioExist) {

                    $auth->crearUsuario();
                }
            }
        }

        $router->render('auth/registro', [
            
        ]);

    }
    
    public static function logout( Router $router ) {
        
        session_start();

        $_SESSION = [];
        
        header('Location: /');

    }
}

?>