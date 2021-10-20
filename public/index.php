<!-- This´s the modul for Router -->

<?php 
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;

use Controllers\DatosController;
use Controllers\LoginController;
use Controllers\PagesController;
use Controllers\ProductController;

$router = new Router();

// === Administracion
$router->get('/admin', [ProductController::class, 'index']);

// Productos

$router->get('/product/crear', [ProductController::class, 'crear']);
$router->post('/product/crear', [ProductController::class, 'crear']);

$router->get('/product/actualizar', [ProductController::class, 'actualizar']);
$router->post('/product/actualizar', [ProductController::class, 'actualizar']);

$router->post('/product/eliminar', [ProductController::class, 'eliminar']);

// Datos

$router->get('/datos/crear', [DatosController::class, 'crear']);
$router->post('/datos/crear', [DatosController::class, 'crear']);

$router->get('/datos/actualizar', [DatosController::class, 'actualizar']);
$router->post('/datos/actualizar', [DatosController::class, 'actualizar']);

$router->post('/datos/eliminar', [DatosController::class, 'eliminar']);

// Zona Publica

$router->get('/', [PagesController::class, 'index']);
$router->get('/productos', [PagesController::class, 'productos']);
$router->get('/producto', [PagesController::class, 'producto']);
$router->get('/carrito', [PagesController::class, 'carrito']);

// Log-in and Log-out

// Login y autenticacion || Iniciar Sesion
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);

// Crear Sesion
$router->get('/registro', [LoginController::class, 'registro']);
$router->post('/registro', [LoginController::class, 'registro']);

// Cerrar Sesion
$router->get('/cerrar-sesion', [LoginController::class, 'logout']);


$router->comprobarRutas();

?>