<h1>Gestionar Categorias</h1>
<br>
<div style="float: left;">
    <a class="btn-agregar" href="index.php?controlador=ControladorCategoria&accion=crear" style="margin-right: 10px;">Crear Categoria</a>
    <a class="btn-eliminar" href="index.php?controlador=ControladorCategoria&accion=eliminar" style="margin-right: 10px;">Eliminar Categoria</a>
</div>

<!-- Verificamos que exista categorias, si existe lo iteramos -->
<?php if(isset($categorias)) : ?>
    <br><br>
    <table>
        <thead>
        <th>Id Categoria</th>
        <th>Nombre Categoria</th>
        </thead>
        <tbody>
        <?php while($categoria = $categorias->fetch_object()) : ?>
            <tr>
                <td><?= $categoria->id; ?></td>
                <td><?= $categoria->nombre; ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
<?php endif; ?>
