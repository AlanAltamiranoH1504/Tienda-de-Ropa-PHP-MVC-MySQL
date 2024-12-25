<?php
    //Cargamos la conexion a la base de datos
    require_once "Configuracion/DataBase.php";

    class Categoria{
        //Atributos de la clase
        private $id;
        private $nombre;
        private $db;

        //Constructor que inicializa la conexion a la db
        public function __construct(){
            $this->db = DataBase::conexion();
        }

        //Metodos GET y SET
        public function getId(){
            //Tratamos los datos
            return $this->id;
        }
        public function setId($id){
            $this->db->real_escape_string($this->id);
        }
        public function getNombre(){
            //Tratamos los datos
            return $this->db->real_escape_string($this->nombre);
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        //Metodo que trae las categorias de la DB
        public function listarCategorias(){
            //Variable que contendra false o el arreglo de categorias
            $resultadoFinal = false;

            //Preparamos query
            $queryConsulta = "SELECT * FROM Categorias";
            //Ejecutamos query
            $queryConsulta = $this->db->query($queryConsulta);

            //Verificamos si hay renglones en la consulta
            if($queryConsulta && $queryConsulta->num_rows > 0){
                $resultadoFinal = $queryConsulta;
            }
            return $resultadoFinal;
        }

        //Metodo que crear una crearCategoria
        public function crearCategoria($nombre){
            //Variable global
            $resultadoTotal = false;

            //Tratamos los datos
            $nombreSQL = mysqli_real_escape_string($this->db, $nombre);

            //Preparamos sql
            $query = "INSERT INTO Categorias (nombre) VALUES ('{$nombre}');";
            //Ejecutamos query
            $resultadoQuery = $this->db->query($query);

            //Verificamos si hubo la insercion correcta
            if(isset($resultadoQuery) && $resultadoQuery){
                $resultadoFinal = true;
            }
            return $resultadoFinal;
        }

        //Metodo que elimina una categoria
        public function eliminarCategoria($nombre){
            //Variable global
            $resultadoTotal = false;

            //Tratamos los parametros
            $nombreSQL = mysqli_real_escape_string($this->db, $nombre);
            //Preparamos query
            $query = "DELETE FROM Categorias WHERE nombre = '{$nombreSQL}';";
            //Ejecutamos query
            $resultadoQuery = $this->db->query($query);

            //Verificamos que exita y sea true
            if(isset($resultadoQuery) && $resultadoQuery){
                $resultadoTotal = true;
            }
            return $resultadoTotal;
        }

        //Metodo que lista productos por categoria
        public function listadoPorCategoria($id){
            //Tratamos el id
            $idSQL = mysqli_real_escape_string($this->db, $id);
            //Variable global
            $variableGlobal = false;

            //Preparamos query
            $query = "SELECT Productos.id, Productos.categoria_id, Productos.descripcion, Productos.precio FROM Productos INNER JOIN Categorias ON Productos.categoria_id = Categorias.id WHERE Categorias.id = {$idSQL};";
            //Ejecutamos el query
            $queryResultado = $this->db->query($query);

            //Verificamos que haya rows
            if (isset($queryResultado) && $queryResultado->num_rows > 0){
                $variableGlobal = $queryResultado;
            }
            return $variableGlobal;
        }
    }
?>