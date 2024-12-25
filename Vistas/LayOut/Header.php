<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="Assets/CSS/styles.css">
</head>
<body>
<div id="container">
    <!--Cabecera-->
    <header id="header">
        <div id="logo">
            <img id="logo" src="Assets/Imagenes/camiseta.png" alt="Camiseta Logo"></img>
            <a href="index_maqueta.php">Tienda de Camisetas</a>
        </div>
    </header>

    <!--Menú-->
    <nav id="menu">
        <ul>
            <li>
                <a href="index.php?controlador=ControladorProducto&accion=index">Inicio</a>
            </li>
            <?php $categorias = Utils::showCategorias()?>
                <?php if(isset($categorias) && !empty($categorias)):?>
                    <?php while ($categoria = $categorias->fetch_object()): ?>
                        <li>
                            <a href="index.php?controlador=ControladorCategoria&accion=listadoPorCategoria&id=<?= $categoria->id?>"><?= $categoria->nombre?></a>
                        </li>
                    <?php endwhile; ?>
                <?php endif;?>
        </ul>
    </nav>

    <div id="content">