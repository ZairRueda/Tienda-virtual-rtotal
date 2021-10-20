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
                        <?php if (isset($errores['notExist'])) { ?>
                            <div class="alerta">
                                <div class="texto">
                                    <?php echo $errores['notExist']; ?>
                                </div>
                            </div>

                        <?php }; ?>
                    </div>

                    <div class="login__box">
                        <i class='bx bx-lock-alt login__icon'></i>
                        <input type="password" name="password" placeholder="Contraseña" class="login__input" required>
                    </div>
                    <div>
                        <?php if (isset($errores['incorrecto'])) { ?>
                            <div class="alerta">
                                <div class="texto">
                                    <?php echo $errores['incorrecto']; ?>
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