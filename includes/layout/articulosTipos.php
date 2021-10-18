<?php
use App\Talla;

foreach ($tipo as $articulo) { 
    
$tallas = Talla::find($articulo->talla_id); 

?>

<div class="revel__product">
    <img src="imagenes/<?php echo $articulo->imagen ?>" alt="imagen producto" class="accessory__img">
    <h3 class="accessory__title">
        <?php echo $articulo->marca; ?>
    </h3>
    <span class="accessory__category">
        <?php echo $tallas->talla; ?>
    </span>
    <span class="accessory__preci">$
        <?php echo $articulo->precio; ?>
    </span>
    <a href="producto.php?id=<?php echo $articulo->id; ?>" class="ver_mas button">Ver Mas</a>

    <a href="#" class="button accessory__button"><i class='bx bx-plus-medical'></i></i></a>
</div>

<?php }; ?>
