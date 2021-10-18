<?php

require 'includes/app.php';

if (!isset($_SESSION)) {
    session_start();
}

// $db = conectarDB();

$errores = [];

$cont = false;
$contDos = false;
$contTres = false;
$contCuatro = false;

$usuario = '';
$email = '';

// ==== REGISTRO ==== 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $usuario = mysqli_real_escape_string($db, $_POST['usuario']);
    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    if (!$usuario) {
        $errores['usuario'] = 'Ingresa un usuario';

        $cont = true;
    }

    if (!$email) {
        $errores['email'] = 'El email es obligatorio o no es valido';

        $contDos = true;
    }

    if (!$password) {
        $errores['password'] = 'El Password es obligatorio';

        $contTres = true;
    }

    if (empty($errores)) {

        $query = "SELECT * FROM usuarios WHERE e_mail = '${email}' AND usuario = '${usuario}'";
        $resultado = mysqli_query($db, $query);

        if ($resultado->num_rows) {


            $errores['exist'] = 'Este usuario o correo ya existen';

            $contCuatro = true;


        } else {

            $query = " INSERT INTO usuarios ( usuario, e_mail, password) VALUES ('${usuario}', '${email}', '${passwordHash}') ";

            mysqli_query($db, $query);

            header('Location: /login.php?resultado=1');
        }
    }
}



incluirTemplate('header');

?>

<main>

    <?php if ($contCuatro == true) { ?>
        <div class="alerta">
            <div class="texto error">
                <?php echo $errores['exist']; ?>
            </div>
        </div>
    <?php }; ?>


    <div class="login">

        <div class="login__content">
            <div class="login__img">
                <img src="build/img/tum1.webp" alt="">
            </div>

            <div class="login__forms">

                <!-- REGISTRO -->

                <form method="POST" id="login-up" class="login__create">

                    <h1 class="login__title">Crear Cuenta</h1>

                    <div class="login__box">
                        <i class='bx bx-user login__icon'></i>
                        <input type="text" name="usuario" placeholder="Username" class="login__input" required>
                    </div>

                    <div>
                        <?php if ($contDos == true) { ?>
                            <div class="alerta">
                                <div class="texto">
                                    <?php echo $errores['email']; ?>
                                </div>
                            </div>

                        <?php }; ?>
                    </div>
                    <div class="login__box">
                        <i class='bx bx-at login__icon'></i>
                        <input type="text" name="email" placeholder="Email" class="login__input" required>
                    </div>

                    <div>
                        <?php if ($contTres == true) { ?>
                            <div class="alerta">
                                <div class="texto">
                                    <?php echo $errores['password']; ?>
                                </div>
                            </div>

                        <?php }; ?>
                    </div>
                    <div class="login__box">
                        <i class='bx bx-lock-alt login__icon'></i>
                        <input type="password" name="password" placeholder="Password" class="login__input" required>
                    </div>

                    <a class="login__submit">
                        <input type="submit" value="Crear">
                    </a>


                    <div>
                        <span class="login__account">¿Ya tiene una cuenta?</span>
                        <span class="login__signup" id="sign-in"><a href="login.php">Iniciar Sesión</a></span>
                    </div>



                    <div class="login__social">
                        <a href="#" class="login__social-icon"><i class='bx bxl-facebook'></i></a>
                        <a href="#" class="login__social-icon"><i class='bx bxl-twitter'></i></a>
                        <a href="#" class="login__social-icon"><i class='bx bxl-google'></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>


</main>

<?php incluirTemplate('footer') ?>