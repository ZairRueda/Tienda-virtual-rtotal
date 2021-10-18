<?php

require 'includes/app.php';

// $auth = estaAutenticado();

// $auth = $_SESSION['login'] ?? null ;

// if ($auth) {
//     header('Location: /index');
// }

if (!isset($_SESSION)) {
    session_start();
}

$resultado = $_GET['resultado'] ?? null;

// Importar la conexion
// require 'includes/config/database.php';
// $db = conectarDB();


$errores = [];

$cont = false;
$contDos = false;
$contTres = false;
$contCuatro = false;

$email = '';




if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // $usuario = mysqli_real_escape_string($db, filter_var($_POST['usuario']));

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));

    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores['email'] = 'Ingresa tu email';

        $cont = true;
    }

    if (!$password) {
        $errores['password'] = 'El Password es obligatorio';

        $contDos = true;
    }

    // echo '<pre>';
    // var_dump($errores);
    // echo '</pre>';

    if (empty($errores)) {

        // Buscar que el usuario exista
        $query = "SELECT * FROM usuarios WHERE e_mail = '${email}'";
        $resultado = mysqli_query($db, $query);

        // echo '<pre>';
        // var_dump($resultado);
        // echo '</pre>';

        // FIXME Recordatorio al ser un objeto el que estamos trallendo, se accede por medio de la sintaxis de flecha
        // Esto es para verificar que el usuario exista, el num_rows lo sacamos del $resultado que nos dio la consulta
        if ($resultado->num_rows) {
            // Revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);

            // echo '<pre>';
            // var_dump($usuario);
            // echo '</pre>';

            // exit;


            

            // No se puede deshashear un password, pra esto PHP tiene su propia funcion
            // Verificar si el password es correcto o no
            $auth = password_verify($password, $usuario['password']);
            // A esta funcion se le pasa el password que el usuario escribio y el password de la base de datos
            // var_dump($auth);

            if ($auth && $usuario["usuario"] !== 'moi') {
                // El usuario ya esta autenticado entonces...

                // SUPER GLOBAL SESSION
                session_start();

                // NOTE de esta manera se pueden crear roles en una pagina o asiganar que cambien segun la persona que haya ingresado 
                // Al acceder a la super global session ya se le puede agregar cualquier cosa
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;
                $_SESSION['cliente'] = true;

                header('Location: /index');
                
            } elseif ($auth && $usuario["usuario"] === 'moi') {
                // echo '<pre>';
                // echo 'Desde el administrador';
                // echo '</pre>';

                // exit;
                // SUPER GLOBAL SESSION
                session_start();

                // NOTE de esta manera se pueden crear roles en una pagina o asiganar que cambien segun la persona que haya ingresado 
                // Al acceder a la super global session ya se le puede agregar cualquier cosa
                $_SESSION["usuario"] = $usuario["e_mail"];
                $_SESSION['login'] = true;
                $_SESSION['admin'] = true;

                // echo '<pre>';
                // var_dump($_SESSION);
                // echo '</pre>';

                // exit;

                header('Location: /admin');
            } else {
                $errores['incorrecta'] = 'Contraseña incorrecta';

                $contTres = true;
            }
        } else {
            $errores['nonexist'] = 'El email no existe';

            $contCuatro = true;
        }
    }
}





incluirTemplate('header');

?>

<main>

    <?php if (intval(isset($_GET['resultado'])) === 1) { ?>
        <div class="alerta">
            <div class="texto exito">
            <?php echo 'Se a registrado correctamente, Inicie Sesión'; ?>
            </div>
        </div>
    <?php };?>

    <div class="login">

        <div class="login__content">
            <div class="login__img">
                <img src="build/img/tum1.webp" alt="">
            </div>

            <div class="login__forms">

                <!-- INICIAR SESION -->

                <form method="POST" class="login__registre" id="login-in">
                    <h1 class="login__title">Iniciar Sesión</h1>

                    <div class="login__box">
                        <i class='bx bx-user login__icon'></i>
                        <input type="email" name="email"  placeholder="Correo" class="login__input" required>
                    </div>
                    
                    <div>
                        <?php if ($contCuatro == true) { ?>
                            <div class="alerta">
                                <div class="texto">
                                    <?php echo $errores['nonexist']; ?>
                                </div>
                            </div>

                        <?php }; ?>
                    </div>

                    <div class="login__box">
                        <i class='bx bx-lock-alt login__icon'></i>
                        <input type="password" name="password" placeholder="Contraseña" class="login__input" required>
                    </div>
                    <div>
                        <?php if ($contTres == true) { ?>
                            <div class="alerta">
                                <div class="texto">
                                    <?php echo $errores['incorrecta']; ?>
                                </div>
                            </div>

                        <?php }; ?>
                    </div>

                    <a href="#" class="login__forgot">¿No recuerdas tu contraceña?</a>

                    <a class="login__submit">
                        <input type="submit" value="Iniciar Sesión">
                    </a>

                    <div>
                        <span class="login__account">¿Aun no tiene una cuenta?</span>
                        <span class="login__signin" id="sign-up"><a href="registro.php">Crear Cuenta</a></span>
                    </div>

                </form>
            </div>
        </div>
    </div>


</main>

<?php incluirTemplate('footer') ?>
