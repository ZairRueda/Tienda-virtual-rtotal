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
            <a href="/index.php" class="nav__logo">R <span>Total</span></a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">

                    <li class="nav__item"><a href="/index.php#home" class="nav__link active-link">Inicio</a></li>

                    <li class="nav__item"><a href="/index.php#decoration" class="nav__link">Top</a></li>

                    <li class="nav__item"><a href="/index.php#accessory" class="nav__link">Paquetes</a></li>

                    <li class="nav__item"><a href="/productos.php" class=" nav__product">Productos</a> </li>

                    
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
                    <a href="login.php" class="nav__usuario"><i class='bx bx-user'></i></a>
                <?php } elseif($_SESSION['login'] === true) { ?>
                    <a href="/cerrar-sesion.php" class="cerrar" alt="cerrar sesion">
                        <i class='bx bx-log-out'></i>
                    </a>
                <?php }?>
                
            </div>


            <!-- Pendiente agregar el Carrito -->

            <?php include __DIR__ . '/arregloCarrito.php'; ?>
        </nav>

    </header>