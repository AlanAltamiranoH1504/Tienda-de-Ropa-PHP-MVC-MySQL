<h1>Gestion de Productos</h1><br>

<div style="float:left;">
    <a class="btn-agregar" href="index.php?controlador=ControladorProducto&accion=agregar">Agregar Producto</a>
</div>


<?php if(isset($resultadoGestion)): ?>
    <br><br><br><table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Categoria Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Oferta</th>
                <th>Fecha</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php while($producto = $resultadoGestion->fetch_object()): ?>
                <tr>
                    <td><?= $producto->id?></td>
                    <td><?= $producto->categoria_id?></td>
                    <td><?= $producto->nombre?></td>
                    <td><?= $producto->descripcion?></td>
                    <td><?= $producto->precio?></td>
                    <td><?= $producto->stock?></td>
                    <td><?= $producto->oferta?></td>
                    <td><?= $producto->fecha?></td>
                    <td><a class="btn-editar" href="index.php?controlador=ControladorProducto&accion=editarFormulario&id=<?= $producto->id?>" >¿?</a></td>
                    <td><a class="btn-eliminar" href="index.php?controlador=ControladorProducto&accion=eliminar&id=<?= $producto->id?>">X</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php endif;?>
