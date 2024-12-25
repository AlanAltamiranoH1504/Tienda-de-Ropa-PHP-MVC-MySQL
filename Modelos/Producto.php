<?php
    //Caragamos la DB
    require_once "Configuracion/DataBase.php";

    class Producto{
        //Atributos de la clase
        private $id;
        private $categoria_id;
        private $nombre;
        private $descripcion;
        private $precio;
        private $stock;
        private $oferta;
        private $fecha;
        private $imagen;
        private $db;

        //Constructor que inicializa la DB
        public function __construct(){
            $this->db = DataBase::conexion();
        }

        //Metodos GET y SET
        public function getId(){
            return $this->db->real_escape_string($this->id);
        }
        public function setId($id){
            $this->id = $id;
        }
        public function getCategoria_id(){
            return $this->db->real_escape_string($this->categoria_id);
        }
        public function setCategoria_id($categoria_id){
            $this->categoria_id = $categoria_id;
        }
        public function getNombre(){
            return $this->db->real_escape_string($this->nombre);
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function getDescripcion(){
            return $this->db->real_escape_string($this->descripcion);
        }
        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }
        public function getPrecio(){
            return $this->db->real_escape_string($this->precio);
        }
        public function setPrecio($precio){
            $this->precio = $precio;
        }
        public function getStock(){
            return $this->db->real_escape_string($this->stock);
        }
        public function setStock($stock){
            $this->stock = $stock;
        }
        public function getOferta(){
            return $this->db->real_escape_string($this->oferta);
        }
        public function setOferta($oferta){
            $this->oferta = $oferta;
        }
        public function getFecha(){
            return $this->db->real_escape_string($this->fecha);
        }
        public function setFecha($fecha){
            $this->fecha = $fecha;
        }
        public function getImagen(){
            return $this->db->real_escape_string($this->imagen);
        }
        public function setImagen($imagen){
            $this->imagen = $imagen;
        }

        //Metodo que lista un producto
        public function getOne($id){
            //Preparamos query
            $query= "SELECT * FROM Productos WHERE id='{$id}'";
            //Ejecutamos y guardamos resultado en variable
            $queryResultado = $this->db->query($query);

            //Variable global
            $variableGlobal = false;
            if(isset($queryResultado) && $queryResultado->num_rows > 0){
                $variableGlobal = $queryResultado;
            }
            return $variableGlobal;
        }

        //Metodo que lista los productos
        public function listarProductos(){
            //Preparamos query
            $querySelect = "SELECT * FROM Productos";
            //Ejecutamos query
            $resultadoQuery = $this->db->query($querySelect);

            return $resultadoQuery;
        }

        //Metodo que lista productos de manera aleatoria
        public function productosAleatorios(){
            //Variable global
            $variableGlobal = false;

            //Preparamos el query
            $query = "SELECT * FROM Productos ORDER BY RAND() LIMIT 6";
            //Ejecutamos el query
            $resultadoQuery = $this->db->query($query);

            //Verificamos resultadoQuery
            if (isset($resultadoQuery) && $resultadoQuery->num_rows > 0){
                $variableGlobal = $resultadoQuery;
            }
            return $variableGlobal;
        }

        //Metodo que guarda un producto en la base de datos
        public function guardar($categoria_id, $nombre, $descripcion, $precio, $stock, $oferta, $fecha){
            //Variable global
            $variableGlobal = false;

            //Preparamos el query
            $query = "INSERT INTO Productos(categoria_id, nombre, descripcion, precio, stock, oferta, fecha) VALUES('{$categoria_id}', '{$nombre}', '{$descripcion}', '{$precio}', '{$stock}', '{$oferta}', '{$fecha}');";
            //Ejecutamos el query
            $resultadoQuery = $this->db->query($query);

            //Evaluamos la insercion
            if(isset($resultadoQuery)){
                $variableGlobal = true;
            }
            //Regresamos true o false
            return $variableGlobal;
        }

        //Metodo que elimina un producto de la base de la base de datos
        public function eliminar($id){
            //Variable global
            $variableGlobal = false;

            //Tratamos los datos
            $idSQL = mysqli_real_escape_string($this->db, $id);

            //Preparamos el query
            $query = "DELETE FROM Productos WHERE id = '{$idSQL}';";
            //Ejecutamos el query
            $resultadoQuery = $this->db->query($query);

            //Verificamos el resultado del query
            if (isset($resultadoQuery) && $resultadoQuery == 1){
                $variableGlobal = true;
            }
            return $variableGlobal;
        }

        //Metodo que actualiza un producto en la base de datos
        public function update(){
            //Variable global
            $variableGlobal = false;

            //Preparamos query
            $query = "UPDATE Productos SET id = '{$this->getId()}', categoria_id = '{$this->getCategoria_id()}', nombre = '{$this->getNombre()}', descripcion = '{$this->getDescripcion()}', precio = '{$this->getPrecio()}', stock = '{$this->getStock()}', oferta = '{$this->getOferta()}', fecha = '{$this->getFecha()}' WHERE id = {$this->getId()}";
            //Ejecutamos query
            $queryResultado = $this->db->query($query);

            //Verificamos si hubo insercion
            if(isset($queryResultado)){
                $variableGlobal = true;
            }
            return $variableGlobal;
        }
    }
?>