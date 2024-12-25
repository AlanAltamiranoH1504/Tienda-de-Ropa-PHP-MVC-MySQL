<h1>Registrarse</h1>

<?php
//Mostramos que hay una session
//    if (isset($_SESSION['register']) && $_SESSION['register'] === "Complete"){
//        echo $_SESSION['register'];
//    }else{
//        echo "<h1>Registro Fallido</h1>";
//    }
?>

<?php
//Borramos la session
Utils::deleteSession("register");
?>

<form action="index.php?controlador=ControladorUsuario&accion=guardar" method="post">
    <p>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre"/>
    </p>

    <p>
        <label for="apellidos">Apellidos: </label>
        <input type="text" name="apellidos"/>
    </p>

    <p>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email"/>
    </p>

    <p>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password"/>
    </p>

    <p>
        <input type="submit" value="Registrarse"/>
    </p>
</form>