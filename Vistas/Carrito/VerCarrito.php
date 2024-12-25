<?php if (isset($_SESSION['identity']) && !empty($_SESSION['carrito'])): ?>
    <h1>Carrito de la Compra</h1>

    <table>
        <thead>
        <tr>
            <th>Nombre Producto</th>
            <th>Precio x Unidad</th>
            <th>Cantidad de Unidades</th>
            <th>Total x Producto</th>
            <th>Eliminar</th>
            <th>Aumentar</th>
            <th>Disminuir</th>
        </tr>
        </thead>
        <tbody>
        <?php $acumuladorTotal = 0;?>
        <!-- Iteramos el array de carrito de la sesion -->
        <?php foreach ($_SESSION['carrito'] as $indice => $producto): ?>
            <?php
            $totalXProducto = $producto['unidades'] * $producto['precio'];
            $acumuladorTotal += $totalXProducto;

            $_SESSION['totalCarrito'] = $acumuladorTotal;

            ?>
            <tr>
                <td><?= $producto['nombre']?></td>
                <td><?= $producto['precio']?></td>
                <td><?= $producto['unidades']?></td>
                <td><?= $totalXProducto ?></td>
                <td><a style="margin: 30px 10px" class="btn-eliminar" href="index.php?controlador=ControladorCarrito&accion=eliminar&id=<?= $producto['id']?>">Eliminar</a></td>
                <td><a class="btn-agregar" href="index.php?controlador=ControladorCarrito&accion=aumentar&id=<?=$producto['id']?>">+1</a></td>
                <td><a class="btn-eliminar" href="index.php?controlador=ControladorCarrito&accion=disminuir&id=<?= $producto['id']?>">-1</a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
        <h2>Total del Carrito: $<?= $acumuladorTotal?></h2>
    </table>
    <br>
    <a href="index.php?controlador=ControladorPedido&accion=hacer" class="btn-agregar">Continuar con el pedido</a>
    <a class="btn-eliminar" href="index.php?controlador=ControladorCarrito&accion=eliminarCarrito&id=<?= $producto['id']?>">Vaciar carrito</a>
<?php elseif (empty($_SESSION['carrito'])): ?>
    <h1>No tienes productos en el carrito</h1>
<?php else: ?>
    <h1>Inicia sesion por favor</h1>
<?php endif;?>
