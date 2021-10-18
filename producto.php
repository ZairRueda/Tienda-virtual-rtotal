<?php  
require 'includes/app.php';

if (!isset($_SESSION)) {
    session_start();
}

incluirTemplate('header');
?>

<main>
    
<section>
    <div class="home__container">
        <h1 class="home__title"> Producto </h1>
    </div>
</section>

</main>

<?php incluirTemplate('footer'); ?>