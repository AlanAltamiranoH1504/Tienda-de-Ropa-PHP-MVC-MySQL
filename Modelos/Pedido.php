<?php
    class Pedido{
        private $id;
        private $usuario_id;
        private $provincia;
        private $localidad;
        private $direccion;
        private $coste;
        private $estado;
        private $fecha;
        private $hora;
        private $db;

        public  function __construct(){
            $this->db = DataBase::conexion();
        }

        public function getId(){
            return $this->db->real_escape_string($this->id);
        }
        public function setId($id){
            $this->id = $id;
        }

        public function getUsuario_id(){
            return $this->db->real_escape_string($this->usuario_id);
        }
        public function setUsuario_id($usuario_id){
            $this->usuario_id = $usuario_id;
        }

        public function getProvincia(){
            return $this->db->real_escape_string($this->provincia);
        }
        public function setProvincia($provincia){
            $this->provincia = $provincia;
        }

        public function getLocalidad(){
            return $this->db->real_escape_string($this->localidad);
        }
        public function setLocalidad($localidad){
            $this->localidad = $localidad;
        }

        public function getDireccion(){
            return $this->db->real_escape_string($this->direccion);
        }
        public function setDireccion($direccion){
            $this->direccion = $direccion;
        }

        public function getCoste(){
            return $this->db->real_escape_string($this->coste);
        }
        public function setCoste($coste){
            $this->coste = $coste;
        }

        public  function getEstado(){
            return $this->db->real_escape_string($this->estado);
        }
        public function setEstado($estado){
            $this->estado = $estado;
        }
        public function getFecha(){
            return $this->db->real_escape_string($this->fecha);
        }
        public function setFecha($fecha){
            $this->fecha = $fecha;
        }
        public function getHora(){
            return $this->db->real_escape_string($this->hora);
        }
        public function setHora($hora){
            $this->hora = $hora;
        }

        public  function save(){
            $resultadoSave = false;

            $query = "INSERT INTO Pedidos(usuario_id, provincia, localidad, direccion, coste, estado,fecha, hora) VALUES('{$this->getUsuario_id()}', '{$this->getProvincia()}', '{$this->getLocalidad()}', '{$this->getDireccion()}', '{$this->getCoste()}', '{$this->getEstado()}', CURRENT_DATE, TIME (NOW()))";
            $ejecucionQuery = $this->db->query($query);

            if(isset($ejecucionQuery)){
                $resultadoSave = true;
            }
            return $resultadoSave;
        }

        public function saveLineasPedido(){
            $queryUltimoID = "SELECT LAST_INSERT_ID()";
            $ejecucionQueryUltimoID = $this->db->query($queryUltimoID);
            $resultadoUltimoID = $ejecucionQueryUltimoID->fetch_object();
            $ultimoID = $resultadoUltimoID->{'LAST_INSERT_ID()'};

            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                $producto = $elemento['producto'];

                $insert = "INSERT INTO Lineas_Pedido(pedido_id, producto_id, unidades) VALUES ({$ultimoID}, {$producto->id}, {$elemento['unidades']})";
                $ejecucionInsert = $this->db->query($insert);
                return $ejecucionInsert;
            }
        }

        public function getAllAdmin(){
            $resultadoConsulta = false;

            $query = "SELECT * FROM Pedidos";
            $ejecucionQuery = $this->db->query($query);

            if(isset($ejecucionQuery) && $ejecucionQuery->num_rows > 0){
                $resultadoConsulta = $ejecucionQuery;
            }
            return $resultadoConsulta;
        }

        public function getAllUsuario(){
            $resultadoConsulta = false;

            $query = "SELECT * FROM Pedidos WHERE usuario_id = '{$this->getUsuario_id()}'";
            $ejecucionQuery = $this->db->query($query);

            if (isset($ejecucionQuery) && $ejecucionQuery->num_rows > 0){
                $resultadoConsulta = $ejecucionQuery;
            }
            return $resultadoConsulta;
        }

        public function eliminar(){
            $resultadoDelete =false;
            $query = "DELETE FROM Pedidos WHERE id = '{$this->getId()}'";
            $ejecucionQuery = $this->db->query($query);

            if (isset($ejecucionQuery)){
                $resultadoDelete = true;
            }
            return $resultadoDelete;
        }
    }
?>