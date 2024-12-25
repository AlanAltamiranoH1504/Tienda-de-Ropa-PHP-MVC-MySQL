<?php if (isset($resultadoConsulta)): ?>
    <h1>Mis Pedidos</h1>
    <table>
        <thead>
            <tr>
                <th>Id Pedido</th>
                <th>Provincia</th>
                <th>Localidad</th>
                <th>Dirreccion</th>
                <th>Coste</th>
                <th>Fecha y Hora</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($pedido = $resultadoConsulta->fetch_object()): ?>
                <tr>
                    <td><?= $pedido->id?></td>
                    <td><?= $pedido->provincia?></td>
                    <td><?= $pedido->localidad?></td>
                    <td><?= $pedido->direccion?></td>
                    <td><?= $pedido->coste?></td>
                    <td><?= $pedido->hora?></td>
                    <td><?= $pedido->estado?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else:?>
    <h1>No cuentas con pedidos</h1>
    <a class="btn-agregar" href="index.php?controlador=ControladorProducto&accion=index">Regresar a Destacados</a>
<?php endif;?>

