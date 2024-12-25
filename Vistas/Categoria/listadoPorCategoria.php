<?php if (isset($resultado) && $resultado->num_rows > 0): ?>
    <?php while ($producto = $resultado->fetch_object()): ?>

        <div class="product">
            <img src="../../Assets/Imagenes/camiseta.png" alt="camiseta" />
            <h2><?= $producto->descripcion?></h2>
            <p>$<?= $producto->precio?> pesos</p>
            <a href="index.php?controlador=ControladorProducto&accion=detallesProducto&id=<?= $producto->id?>">Detalles Producto</a>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
