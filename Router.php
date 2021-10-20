<?php 

namespace MVC;

class Router {
    
    public $rutasGET = [];

    public $rutasPOST = [];

    public function get($url, $fn) {
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn) {
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas() {

        session_start();

        $auth = $_SESSION['login'] ?? null;

        $rutas_protegidas = ['/admin', '/product/crear', '/product/actualizar', '/product/eliminar', '/datos/crear' , '/datos/actualizar'];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET') {

            $fn = $this->rutasGET[$urlActual] ?? null;

        } else if ($metodo === 'POST'){

            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        if(in_array($urlActual, $rutas_protegidas) && !$auth) {
            header('Location: / ');
        }

        if ($fn) {

            call_user_func($fn, $this);
             
        } else {
            echo "Pagina No encontrada";
        }

        
    }

    public function render($view, $datos = []) {

        foreach ($datos as $key => $valor) {

            $$key = $valor;

        }

        ob_start();

        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean();

        include __DIR__ . "/views/layout.php";
    }
}