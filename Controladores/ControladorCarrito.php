<?php
    //Cargamos modelo Producto
    require_once "Modelos/Producto.php";

    class ControladorCarrito{
        //Metodo index
        public function index(){
            if (isset($_SESSION["carrito"])) {
                $carrito = $_SESSION['carrito'];
                require_once "Vistas/Carrito/VerCarrito.php";
            }else{
                echo "<h1>Tu carrito esta vacio.</h1>";
            }
        }

        public function añadir() {
            // Recogemos el parámetro
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $_GET['id'];

                // Verificamos la sesión de carrito
                if (!isset($_SESSION['carrito'])) {
                    $_SESSION['carrito'] = []; // Inicializamos el carrito si no existe
                }

                $contador = 0;
                foreach ($_SESSION['carrito'] as $indice => $elemento) {
                    if ($elemento['id'] == $id) {
                        $_SESSION['carrito'][$indice]['unidades']++;
                        $contador++;
                        break; // Terminamos el bucle ya que encontramos el producto
                    }
                }

                // Si no se encontró el producto en el carrito, lo añadimos
                if ($contador == 0) {
                    $producto = new Producto();
                    $resultadoSelect = $producto->getOne($id);
                    $productoEncontrado = mysqli_fetch_object($resultadoSelect);

                    // Pasamos el producto encontrado a la sesión de carrito
                    if (is_object($productoEncontrado)) {
                        $_SESSION['carrito'][] = array(
                            'id' => $productoEncontrado->id,
                            'nombre' => $productoEncontrado->nombre,
                            'precio' => $productoEncontrado->precio,
                            'unidades' => 1,
                            'producto' => $productoEncontrado
                        );
                    }
                }
                $dato = null;
                header("Location: index.php?controlador=ControladorProducto&accion=index");
            }
        }


        //Metodo elimina producto del carrito
        public function eliminar(){
            //Recogemos el id
            if (isset($_GET['id']) && !empty($_GET['id'])){
                $id = $_GET['id'];

                foreach ($_SESSION['carrito'] as $indice => $elemento){
                    if ($elemento['id'] == $id){
                        unset($_SESSION['carrito'][$indice]);
                        header("Location: index.php?controlador=ControladorCarrito&accion=index");
                        break;
                    }
                }
            }
        }

        //Metodo que elimina el carrito
        public function eliminarCarrito(){
            //Eliminamos la session carrito
            unset($_SESSION['carrito']);
            header("Location: index.php?controlador=ControladorCarrito&accion=index");
        }

        public function aumentar(){
            if (isset($_GET['id']) && !empty($_GET['id'])){
                $id = $_GET['id'];
                foreach ($_SESSION['carrito'] as $indice => $elemento){
                    if ($elemento['id'] == $id){
                        $_SESSION['carrito'][$indice]['unidades']++;
                        header("Location: index.php?controlador=ControladorCarrito&accion=index");
                    }
                }
            }
        }

        public function disminuir(){
            if (isset($_GET['id']) && !empty($_GET['id'])){
                $id = $_GET['id'];
                foreach ($_SESSION['carrito'] as $indice => $elemento){
                    if ($elemento['id'] == $id){
                        $_SESSION['carrito'][$indice]['unidades']--;
                        header("Location: index.php?controlador=ControladorCarrito&accion=index");
                    }
                }
            }
        }
    }
?>