<?php 
$auth = $_SESSION['login'] ?? false;

if (!isset($_SESSION)) {
    session_start();
}

// debuguear($_SESSION);
?>

<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8" />
    <title>RTOTAL</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />

    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link rel="manifest" href="site.webmanifest" />
    <!-- Place favicon.ico in the root directory -->
    <!--========== BOX ICONS ==========-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="/build/css/app.css" />

    <meta name="theme-color" content="#fafafa" />
</head>

<body class="area">
    <!--========== SCROLL TOP ==========-->
    <a href="#" class="scrolltop" id="scroll-top">
        <i class=' scrolltop__icon'>
            <span class="uno"></span>
        </i>
    </a>

    <!--========== HEADER ==========-->

    <header class="l-header" id="header">
        <nav class="nav bd-container">
            <a href="/" class="nav__logo">R <span>Total</span></a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">

                    <li class="nav__item"><a href="/#home" class="nav__link">Inicio</a></li>

                    <li class="nav__item"><a href="/#decoration" class="nav__link">Top</a></li>

                    <li class="nav__item"><a href="/#accessory" class="nav__link">Paquetes</a></li>

                    <li class="nav__item"><a href="/productos" class=" nav__product">Productos</a> </li>

                    
                    <?php if (isset($_SESSION['admin'])) { ?>
                        <li class="nav__item"><a href="/admin" class=" nav__product">Administrar</a> </li>
                    <?php } ?>


                    <li><i class='bx bx-toggle-left change-theme' id="theme-button"></i></li>

                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class=''>
                    <span class="uno"></span>
                    <span class="dos"></span>
                    <span class="tres"></span>
                    <span class="cuatro"></span>
                </i>

            </div>

            <div class="nav__user">
                <?php if ($_SESSION === []) { ?>
                    <a href="/login" class="nav__usuario"><i class='bx bx-user'></i></a>
                <?php } elseif($_SESSION['login'] === true) { ?>
                    <a href="/cerrar-sesion" class="cerrar" alt="cerrar sesion">
                        <i class='bx bx-log-out'></i>
                    </a>
                <?php }?>
                
            </div>


            <!-- Pendiente agregar el Carrito -->

            <?php include __DIR__ . '/cart/arregloCarrito.php'; ?>
        </nav>

    </header>
<!--  -->

<?php echo $contenido; ?>

<!--  -->
    <!--========== FOOTER ==========-->
   <footer class="footer section">
        <div class="footer__container bd-container bd-grid">
            <div class="footer__content">
                <h3 class="footer__title">
                    <a href="#" class="footer__logo">Nosotros</a>
                </h3>
                <p class="footer__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto quos repellendus commodi, debitis quia a fugiat animi aliquid quis?</p>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Menu</h3>
                <ul>
                    <li><a href="#" class="footer__link">Inicio</a></li>
                    <li><a href="#" class="footer__link">Mas Vendido</a></li>
                    <li><a href="#" class="footer__link">Paquetes</a></li>
                    <li><a href="#" class="footer__link">Productos</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Info</h3>
                <ul>
                    <li><a href="#" class="footer__link">Envios</a></li>
                    <li><a href="#" class="footer__link">Rastreo</a></li>
                    <li><a href="#" class="footer__link">Seguridad</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Social</h3>
                <a href="#" class="footer__social"><i class='bx bxl-facebook-circle '></i></a>
                <a href="#" class="footer__social"><i class='bx bxl-twitter'></i></a>
                <a href="#" class="footer__social"><i class='bx bxl-instagram-alt'></i></a>
            </div>
        </div>

        <p class="footer__copy">&#169; 2021 RTotal todos los derechos recervados</p>
    </footer>



    <!--========== SCROLL REVEAL ==========-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- <script src="build/js/bundle.min.js"></script> -->
    <!--========== MAIN JS ==========-->
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="/build/js/modernizr-3.11.2.min.js"></script>
    <script src="/build/js/bundle.min.js"></script>

    <!-- Mercado Pago -->
    <script>
        // Agrega credenciales de SDK
        const mp = new MercadoPago('PUBLIC_KEY', {
                locale: 'es-AR'
        });

        // Inicializa el checkout
        mp.checkout({
            preference: {
                id: 'YOUR_PREFERENCE_ID'
            },
            render: {
                    container: '.cho-container', // Indica el nombre de la clase donde se mostrará el botón de pago
                    label: 'Pagar', // Cambia el texto del botón de pago (opcional)
            }
        });
    </script>

    <!-- Add your site or application content here -->


    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
    window.ga = function() {
        ga.q.push(arguments);
    };
    ga.q = [];
    ga.l = +new Date();
    ga("create", "UA-XXXXX-Y", "auto");
    ga("set", "anonymizeIp", true);
    ga("set", "transport", "beacon");
    ga("send", "pageview");
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>