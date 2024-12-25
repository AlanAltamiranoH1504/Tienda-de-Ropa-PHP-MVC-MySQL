<h1>Editar Producto</h1>

<?php
    //Cargamos modelo
    require_once "Modelos/Producto.php";
    //Guardamos el parametro id y lo tratamos
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = $_GET['id'];

        //Creamos objeto de tipo Producto y llamamos al metodo getOne
        $proucto = new Producto();
        $objetoRelleno = $proucto->getOne($id);
    }
?>

<form action="index.php?controlador=ControladorProducto&accion=editar&id=<?= $_GET['id']?>" method="post">
    <?php while ($proucto = $objetoRelleno->fetch_object()): ?>

        <p>
            <label for="categoria">Categoria ID: </label>
            <select name="categoria" id="categoria">
                <option value="<?= $proucto->categoria_id?>"><?= $proucto->categoria_id?></option>
            </select>
        </p>
        <p>
            <label for="nombre">Nombre Producto: </label>
            <input type="text" name="nombre" required value="<?= $proucto->nombre?>"/>
        </p>
        <p>
            <label for="descripcion">Descripcion Producto: </label>
            <input type="text" name="descripcion" id="descripcion" required value="<?= $proucto->descripcion?>"/>
        </p>
        <p>
            <label for="precio">Precio: </label>
            <input type="text" name="precio" pattern="[0-9]+" title="Solo números" required value="<?= $proucto->precio?>"/>
        </p>
        <p>
            <label for="stock">Stock: </label>
            <input type="text" name="stock" pattern="[0-9]+" title="Solo numeros" required value="<?= $proucto->stock?>"/>
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
            <input type="date" name="fecha" required value="<?= $proucto->fecha?>"/>
        </p>
        <p>
            <label for="imagen">Imagen: </label>
            <input type="file" name="imagen" id="imagen"/>
        </p>

        <p>
            <input type="submit" value="Terminar Edicion Producto"/>
        </p>
    <?php endwhile; ?>
</form>

