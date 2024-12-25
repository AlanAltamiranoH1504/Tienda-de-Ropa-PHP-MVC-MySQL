<h1>Algunos de Nuestros Productos</h1>
<?php if (isset($resultadoAleatorio) && $resultadoAleatorio->num_rows > 0): ?>
    <?php while ($producto = $resultadoAleatorio->fetch_object()): ?>
        <div class="product">
            <img src="Assets/Imagenes/camiseta.png" alt="Camiseta"/>
            <h2><?= $producto->nombre?></h2>
            <p>$<?= $producto->precio?> pesos</p>
            <a href="index.php?controlador=ControladorCarrito&accion=añadir&id=<?= $producto->id?>">Comprar</a>
        </div>
    <?php endwhile; ?>

<?php else: ?>
    <h1>No hay productos</h1>
<?php endif; ?>

