<?php
    //Cargamos el modelo
    require_once "Modelos/Producto.php";

    class ControladorProducto{
        //Metodo index
        public function index(){
            //Instanciamos objeto
            $producto = new Producto();
            $resultadoAleatorio = $producto->productosAleatorios();

            //Renderizamos la vista principal
            require_once "Vistas/Producto/Destacados.php";
        }

        //Metodo gestion
        public function gestion(){
            //Creamos objeto de tipo Producto
            $producto = new Producto();
            //Ejecutamos metodo listarProductos
            $resultadoGestion = $producto->listarProductos();

            //Cargamos vista y se pasa
            require_once "Vistas/Producto/Gestion.php";
        }

        //Metodo agregar. Muestra la vista del formulario
        public function agregar(){
            require_once "Vistas/Producto/Agregar.php";
        }

        //Metodo que guarda un producto en la DB
        public function guardar(){
            //Recogemos los parametros
            if (isset($_POST['categoria']) && !empty($_POST['categoria']) && isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['descripcion']) && !empty($_POST['descripcion'])
            && isset($_POST['precio']) && !empty($_POST['precio']) && isset($_POST['stock']) && !empty($_POST['stock']) && isset($_POST['oferta']) && isset($_POST['fecha'])) {
                $categoria_id = $_POST['categoria'];
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $stock = $_POST['stock'];
                $oferta = $_POST['oferta'];
                $fecha = $_POST['fecha'];

                //Creamos objeto de tipo producto y le seteamos los parametros
                $producto = new Producto();
                $producto->setCategoria_id($categoria_id);
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setOferta($oferta);
                $producto->setFecha($fecha);

                //Llamamos al metodo guardar
                $resultadoInsert = $producto->guardar($categoria_id, $nombre, $descripcion, $precio, $stock, $oferta, $fecha);

                //Evaluamos la situacion del query
                if(isset($resultadoInsert) && $resultadoInsert){
                    echo "<h1>Producto Agregado</h1>";
                    header("Location: index.php?controlador=ControladorProducto&accion=gestion");
                }else{
                    echo "<h1>Producto no agregado</h1>";
                    header("Location: index.php?controlador=ControladorProducto&accion=gestion");
                }
            }
        }

        //Metodo que elimina un producto de la base de datos
        public function eliminar(){
            //Verificamos que existe el atributo id
            if ($_GET['id'] && !empty($_GET['id'])) {
                $id = $_GET['id'];

                //Creamos objeto de tipo producto y le seteamos el id
                $producto = new Producto();
                $producto->setId($id);

                //Llamamos al metodo eliminar
                $resultadoDelete = $producto->eliminar($id);

                header("Location: index.php?controlador=ControladorProducto&accion=gestion");
            }
        }

        //Metodo que muestra el formulario para editar el producto
        public function editarFormulario(){
            //Cargamos la vista del formulario
            require_once "Vistas/Producto/Editar.php";
        }

        //Metodo que edita un producto
        public function editar(){

            //Verificamos que nos lleguen los parametros y los setamos al objeto producto
            if (isset($_GET['id']) && !empty($_GET['id']) && isset($_POST['categoria']) && !empty($_POST['categoria']) && isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['descripcion']) && !empty($_POST['descripcion']) &&
            isset($_POST['precio']) && !empty($_POST['precio']) && isset($_POST['stock']) && !empty($_POST['stock']) && isset($_POST['oferta']) && isset($_POST['fecha'])) {
                $id = $_GET['id'];
                $categoria_id = $_POST['categoria'];
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $stock = $_POST['stock'];
                $oferta = $_POST['oferta'];
                $fecha = $_POST['fecha'];
                $producto = new Producto();

                $producto->setId($id);
                $producto->setCategoria_id($categoria_id);
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setOferta($oferta);
                $producto->setFecha($fecha);

                //Llamamos al metod update
                $resultadoUpdate = $producto->update();
                header("Location: index.php?controlador=ControladorProducto&accion=Gestion");
            }
        }

        //Metodo que saca los detalles de un producto
        public function detallesProducto(){
            //Guardamos el id y lo definimos
            if (isset($_GET['id']) && !empty($_GET['id'])){
                $id = $_GET['id'];

                //Creamos objeto de tipo Producto y llamamos al metodo getOne
                $producto = new Producto();
                $resultado = $producto->getOne($id);

                if (isset($resultado) && $resultado->num_rows > 0) {
                    //Cargamos vista
                    require_once "Vistas/Producto/DetalleIndividual.php";
                }else{
                    header("Location: index.php?controlador=ControladorProducto&accion=gestion");
                }
            }
        }
    }
?>