<h1>Agregar Nuevo Producto</h1>

<form action="index.php?controlador=ControladorProducto&accion=guardar" method="post">
    <p>
        <label for="categoria">Categoria ID: </label>
        <select name="categoria" id="categoria">
            <option value="0">Seleccione</option>
            <?php
            //Creamos objeto de tipo Categoria
            $categoria = new Categoria();
            $categorias = $categoria->listarCategorias();
            ?>
            <?php while ($categoria = $categorias->fetch_object()):?>
                <option value="<?= $categoria->id?>"><?= $categoria->nombre?></option>
            <?php endwhile; ?>
        </select>
    </p>
    <p>
        <label for="nombre">Nombre Producto: </label>
        <input type="text" name="nombre" required/>
    </p>
    <p>
        <label for="descripcion">Descripcion Producto: </label>
        <input type="text" name="descripcion" id="descripcion" required/>
    </p>
    <p>
        <label for="precio">Precio: </label>
        <input type="text" name="precio" pattern="[0-9]+" title="Solo números" required/>
    </p>
    <p>
        <label for="stock">Stock: </label>
        <input type="text" name="stock" pattern="[0-9]+" title="Solo numeros" required/>
    </p>
    <p>
        <label for="oferta">Oferta: </label>
        <select name="oferta" id="oferta">
            <option>Selecciona una opcion</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select>
    </p>
    <p>
        <label for="fecha">Fecha: </label>
        <input type="date" name="fecha" required/>
    </p>
    <p>
        <label for="imagen">Imagen: </label>
        <input type="file" name="imagen" id="imagen"/>
    </p>
    <p>
        <input type="submit" value="Agregar Producto"/>
    </p>
</form>
