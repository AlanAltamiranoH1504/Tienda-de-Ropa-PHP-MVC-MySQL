<!--Barra lateral-->
<aside id="lateral">
    <div id="carrito" class="block_aside">
        <?php if(isset($_SESSION['carrito'])): ?>
            <h3>Mi Cesta</h3>
            <ul>
                <li><a href="index.php?controlador=ControladorCarrito&accion=index">Ver el Carrito</a></li>
                <li></li>
            </ul>
        <?php endif; ?>
    </div>

    <div id="login" class="block_aside">

        <!--Mostramos formulario de inicio de sesion si hay una session identity-->
        <?php if(!isset($_SESSION['identity'])):?>
        <h3>Entrar a la web</h3>
        <form action="index.php?controlador=ControladorUsuario&accion=login" method="post">
            <p>
                <label for="email">Email: </label>
                <input type="email" name="email" id="email"/>
            </p>
            <p>
                <label for="password">Password: </label>
                <input type="password" id="password" name="password"/>
            </p>
            <p>
                <input type="submit" value="Enviar">
            </p>
        </form>
        <br>
        <a href="index.php?controlador=ControladorUsuario&accion=registro">Registrate Aqui</a>
        <!--Si ya existe una sesion mostramos el nombre del usuario de la sesion-->
        <?php else: ?>
            <h3><?php echo "Bienvenido ".$_SESSION['identity']->nombre?></h3>
        <?php endif;?>
        <ul>
            <!--Acorde al tipo de sesion mostramos botones, pero primero verificamos que haya una sesion -->
            <?php if(isset($_SESSION['identity'])):?>
                <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] = true) :?>
                    <li><a href="index.php?controlador=ControladorCategoria&accion=index">Gestionar Categoria</a></li>
                    <li><a href="index.php?controlador=ControladorProducto&accion=gestion">Gestionar Productos</a></li>
                    <li><a href="index.php?controlador=ControladorPedido&accion=getAllAdmin">Gestionar Pedidos</a></li>
                <?php else:?>
                    <li><a href="index.php?controlador=ControladorPedido&accion=getAllUsuario&id=<?= $_SESSION['identity']->id?>">Mis Pedidos</a></li>
                <?php endif;?>
                <li><a href="index.php?controlador=ControladorUsuario&accion=logOut">Cerrar Sesión</a></li>
            <?php endif;?>
        </ul>
    </div>
</aside>

<!--Contenido cetral-->
<div id="central">