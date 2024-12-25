<?php if (isset($resultadoBusqueda)): ?>
    <h1>Gestion Pedidos</h1>

    <table border="1">
    <thead>
    <tr>
        <th>Id Pedido</th>
        <th>Usuario Id</th>
        <th>Provincia</th>
        <th>Localidad</th>
        <th>Direccion</th>
        <th>Coste</th>
        <th>Estado</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Eliminar</th>
    </tr>
    </thead>
    <?php while ($pedido = $resultadoBusqueda->fetch_object()): ?>
        <tbody>
            <tr>
                <td><?= $pedido->id?></td>
                <td><?= $pedido->usuario_id?></td>
                <td><?= $pedido->provincia?></td>
                <td><?= $pedido->localidad?></td>
                <td><?= $pedido->direccion?></td>
                <td><?= $pedido->coste?></td>
                <td><?= $pedido->estado?></td>
                <td><?= $pedido->fecha?></td>
                <td><?= $pedido->hora?></td>
                    <td><a class="btn-eliminar" href="index.php?controlador=ControladorPedido&accion=eliminar&id=<?=$pedido->id?>">X</a></td>
            </tr>
        </tbody>

    <?php endwhile; ?>
    </table>
<?php else:?>
    <h1>No lleglo la variable</h1>
<?php endif;?>
