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
    <script src="/src/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="/src/js/plugins.js"></script>
    <script src="/src/js/app.js"></script>
    <script src="/src/js/main.js"></script>
    <script src="/src/js/all.js"></script>

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