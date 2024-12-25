<?php
    //Cargamos el modelo
    require_once "Modelos/Categoria.php";

    class ControladorCategoria{
        //Metodo index
        public function index(){
            //Creamos objeto de tipo Categoria
            $categoria = new Categoria();

            //Llamamos al metodo listarCategorias y esa variable la mandamos a la vista
            $categorias = $categoria->listarCategorias();

            //Cargamos vista
            require_once "Vistas/Categoria/index.php";
        }

        //Metodo crear
        public function crear(){
            //Llamamos a la vista Crear
            require_once "Vistas/Categoria/Crear.php";
        }
        //Metodo guardar
        public function guardar(){
            //Recibimos los parametros
            if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
                $nombre = $_POST['nombre'];

                //Creamos objeto y le pasamos el parametro
                $categoria = new Categoria();
                $categoria->setNombre($nombre);

                //Mandamos a llamar el metodo crearCategoria
                $resultadoInsert = $categoria->crearCategoria($nombre);

                if(isset($resultadoInsert) && $resultadoInsert){
                    echo "<h1>Categoria Creada</h1>";
                    header("Location: index.php?controlador=ControladorCategoria&accion=index");
                    exit();
                }else{
                    echo "<h1>Error al crear la categoria</h1>";
                    header("Location: index.php?controlador=ControladorCategoria&accion=index");
                    exit();
                }
            }
        }

        //Metodo eliminar
        public function eliminar(){
            //Llamamos a la vista
            require_once "Vistas/Categoria/Eliminar.php";
        }
        //Metodo eliminar2
        public function eliminar2(){
            //Recibimos parametros
            if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
                $nombre = $_POST['nombre'];

                //Creamos objeto de tipo Categoria y ejecutamos el metodo eliminar
                $categoria = new Categoria();
                $resultadoEliminacion = $categoria->eliminarCategoria($nombre);

                header("Location: index.php?controlador=ControladorCategoria&accion=index");
            }
        }

        //Metodo que lista productos por categoria
        public function listadoPorCategoria(){
            //Recogemos el id
            if (isset($_GET['id']) && !empty($_GET['id'])){
                $idCategoria = $_GET['id'];

                //Objeto de tipo categoria y llamamos al metodo listadoPorCategoria
                $categoria = new Categoria();
                $resultado = $categoria->listadoPorCategoria($idCategoria);

                //Verificamos que resultado tenga al menos un rows
                if (isset($resultado) && $resultado->num_rows > 0){
                    //Cargamos vista
                    require_once "Vistas/Categoria/listadoPorCategoria.php";
                }else{
                    echo "<h1>No hay productos en esta categoria</h1>";
                }

            }else{
                header("Location: index.php?controlador=ControladorProducto&accion=index");
            }
        }

    }
?>