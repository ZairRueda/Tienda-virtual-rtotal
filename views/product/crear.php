<main>
    <section class="section bd-container">

        <h1 class="form__titulo">Crear</h1>

        <a href="/admin" class="button"> Volver </a>

        <form class="formulario" method="POST" enctype="multipart/form-data">

            <?php include __DIR__ . '/formulario_articulos.php'; ?>

            <input type="submit" value="Crear Producto" class="button botton__form">

        </form>

    </section>
</main>