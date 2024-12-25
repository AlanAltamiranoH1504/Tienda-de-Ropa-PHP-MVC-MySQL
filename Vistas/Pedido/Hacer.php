<?php if(isset($_SESSION['identity'])): ?>
    <h1>Hacer pedido</h1>
    <a class="btn-agregar" href="Index.php?controlador=ControladorCarrito&accion=index">Ver Carrito</a><br>

    <br><h3>Datos de Envio</h3>
    <form action="Index.php?controlador=ControladorPedido&accion=add" method="post">
        <p>
            <label for="usuario_id">Usuario ID:</label>
            <input type="text" name="usuario_id" id="usuario_id" readonly value="<?= $_SESSION['identity'] -> id?>">
        </p>
        <p>
            <label for="provincia">Provincia: </label>
            <input type="text" name="provincia" id="provincia" required>
        </p>
        <p>
            <label for="localidad">Localidad: </label>
            <input type="text" name="localidad" id="localidad" required>
        </p>
        <p>
            <label for="direccion">Direccion: </label>
            <input type="text" name="direccion" id="direccion" required>
        </p>
        <p>
            <label for="coste">Coste: </label>
            <input type="text" name="coste" id="coste" readonly value="$<?= $_SESSION['totalCarrito'] ?>">
        </p>
        <p>
            <label for="estado">Estado: </label>
            <input type="text" name="estado" id="estado" required>
        </p>
        <p>
            <label for="fecha">Fecha: </label>
            <input type="date" name="fecha" id="fecha">
        </p>
        <p>
            <label for="hora">Hora: </label>
            <input type="datetime-local" name="hora" id="hora">
        </p>
        <p>
            <input type="submit" value="Solicitar Pedido">
        </p>
    </form>
<?php else: ?>
    <h1>Por favor Inicia Sesion</h1>
<?php endif;?>
