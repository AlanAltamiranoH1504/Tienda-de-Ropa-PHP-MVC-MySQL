<h1>Crear Nueva Categoria</h1>

<form action="index.php?controlador=ControladorCategoria&accion=guardar" method="post">
    <p>
        <label for="nombre">Nombre Categoria</label>
        <input type="text" name="nombre" id="nombre" required/>
    </p>
    <p>
        <input type="submit" value="Guardar Categoria"/>
    </p>
</form>