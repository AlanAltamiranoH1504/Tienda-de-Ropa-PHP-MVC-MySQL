<?php
    require_once "Modelos/Pedido.php";

    class ControladorPedido{

        public function hacer(){
            require_once "Vistas/Pedido/Hacer.php";
        }

        public  function add(){
            if (isset($_POST['provincia']) && !empty($_POST['provincia']) && isset($_POST['localidad']) && !empty($_POST['localidad']) && isset($_POST['direccion']) && !empty($_POST['direccion']) && isset($_POST['estado']) && !empty($_POST['estado'])){
                $provincia = $_POST['provincia'];
                $localidad = $_POST['localidad'];
                $direccion = $_POST['direccion'];
                $estado = $_POST['estado'];

                $pedido = new Pedido();
                $pedido->setUsuario_id($_SESSION['identity'] -> id);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($_SESSION['totalCarrito']);
                $pedido->setEstado($estado);

                $resultadoInsert = $pedido->save();
                $lineaPedido =  $pedido->saveLineasPedido();

                if ($resultadoInsert && $lineaPedido){
                    unset($_SESSION['carrito']);
                    echo "<h1>Pedido Confirmado</h1>";
                    echo "<a class='btn-editar' href='Index.php?controlador=ControladorProducto&accion=index'>Regresar a Destacados</a>";
                }
            }
        }

        public function getAllAdmin(){
            $pedido = new Pedido();
            $resultadoBusqueda = $pedido->getAllAdmin();

            if (isset($resultadoBusqueda) && is_object($resultadoBusqueda)){
                require_once "Vistas/Pedido/MostrarPedidos.php";
            }else{
                echo "<h1>No existen pedidos</h1>";
            }
        }

        public function getAllUsuario(){
            if (isset($_GET['id']) && !empty($_GET['id'])){
                $id = $_GET['id'];
                $pedido = new Pedido();
                $pedido->setUsuario_id($id);

                $resultadoConsulta = $pedido->getAllUsuario();
                require_once "Vistas/Pedido/PedidosPorUsuario.php";
            }
        }

        public function eliminar(){
            if (isset($_GET['id']) && !empty($_GET['id'])){
                $id = $_GET['id'];

                $pedido = new Pedido();
                $pedido->setId($id);

                $resultadoDelete = $pedido->eliminar();
                if ($resultadoDelete){
                    header("Location: Index.php?controlador=ControladorProducto&accion=index");
                }
            }
        }
    }
?>