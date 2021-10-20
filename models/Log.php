<?php

namespace Model;

class Log extends ActiveRecord {

    // Base de Datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'usuario','email', 'password'];

    public $id;
    public $usuario;
    public $email;
    public $password;

    public function __construct($args = []) {

        $this->id = $args['id'] ?? null;
        $this->usuario = $args['usuario'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';

    }    

    public function validar() {

        if (!$this->email) {
            self::$errores['email'] = "El email es obligatorio";
        }
    
        if (!$this->password) {
            self::$errores['password'] = "Password es obligatorio";
        }

        return self::$errores;
    
    }

    public function existeUsuario(){
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1 "; 

        // debuguear($query);

        $resultado = self::$db->query($query);

        // debuguear($resultado);

        // Si no existe un numero de tablas
        if (!$resultado->num_rows) {
            self::$errores['notExist'] = 'El email no existe';

            // Retornamos para que ya no se ejecute el codigo
            return;
        }

        // En caso de que si exista
        return $resultado;
    }

    public function existe() {
        $query = "SELECT * FROM " . self::$tabla . " WHERE e_mail = '" . $this->email . "' AND usuario = '" . $this->usuario . "'";

        $resultado = self::$db->query($query);
        
        if ($resultado->num_rows) {
            
            $errores['exist'] = 'Este usuario o correo ya existen';
        
            return;
        }

        return $resultado;
    }

    public function comprobarPassword($resultado) {
        
        // Transforma nuestro query obtenido a un objetopara poder iterarlo
        $usuario = $resultado->fetch_object();

        // debuguear($resultado->fetch_object());

        $autenticado = password_verify($this->password, $usuario->password);

        if(!$autenticado){
            self::$errores['incorrecto'] = 'El password es incorrecto';
        }

        // debuguear($autenticado);

        return $autenticado;

    }

    public function autenticar() {


        if ($this->usuario === 'moi') {
                
            session_start();

            $_SESSION["usuario"] = $usuario["e_mail"];
            $_SESSION['login'] = true;
            $_SESSION['admin'] = true;

            header('Location: /admin');

            exit;
           
            
        } elseif ($this->usuario !== 'moi') {
            
            session_start();

            $_SESSION['usuario'] = $usuario['email'];
            $_SESSION['login'] = true;
            $_SESSION['cliente'] = true;

            header('Location: /');

        } else {
            self::$errores['noEspecificado'] = 'Disculpa Modelo no identificado';
        }

    }
}