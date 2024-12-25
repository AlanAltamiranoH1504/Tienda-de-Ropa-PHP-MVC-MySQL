<?php if (isset($resultado)): ?>
    <?php while ($producto = $resultado->fetch_object()): ?>
        <div class="product">
            <img src="Assets/Imagenes/camiseta.png" alt="Camiseta"/>
            <h2><?= $producto->nombre?></h2>
            <p style="color: black; font-weight: normal"><span style="font-weight: bold">Descripcion:</span> <?= $producto->descripcion?></p>
            <p style="color: black; font-weight: normal"><span style="font-weight: bold">Stock:</span> <?= $producto->stock?> unidades</p>
            <p style="color: black; font-weight: normal"><span style="font-weight: bold">Oferta:</span> <?= $producto->oferta?></p>
            <p style="color: black; font-weight: normal"><span style="font-weight: bold">Fecha:</span> <?= $producto->fecha?></p>
            <p>Precio: $<?= $producto->precio?> pesos</p>
            <a href="index.php?controlador=ControladorCarrito&accion=añadir&id=<?= $producto->id?>" >Comprar</a>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
