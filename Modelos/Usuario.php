<?php
    class Usuario{
        //Atributos
        private $id;
        private $nombre;
        private $apellidos;
        private $email;
        private $password;
        private $rol;
        private $imagen;
        private $db;

        //Constructor para iniciar la conexion a la db
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
        public function getNombre(){
            return $this->db->real_escape_string($this->nombre);
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function getApellidos(){
            return $this->db->real_escape_string($this->apellidos);
        }
        public function setApellidos($apellidos){
            $this->apellidos = $apellidos;
        }
        public function getEmail(){
            return $this->db->real_escape_string($this->email);
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function getPassword(){
            return $this->db->real_escape_string($this->password);
        }
        public function setPassword($password){
            $this->password = $password;
        }
        public function getRol(){
            return $this->db->real_escape_string($this->rol);
        }
        public function setRol($rol){
            $this->rol = $rol;
        }
        public function getImagen(){
            return $this->imagen;
        }
        public function setImagen($imagen){
            $this->imagen = $imagen;
        }

        //Metodo save
        public function save(){
            $registro = $this->db->query("INSERT INTO Usuarios(nombre, apellidos, email, password, rol, imagen) VALUES('{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'Usuario', '1');");

            $resultado = false;
            if ($registro) {
                $resultado = true;
            }
            return $resultado;
        }

        //Metodo login
        public function login($email, $password){
            //Variable bandera para saber si hay un usuario y coinciden las contraseña
            $resultado  = false;

            //Tratamos los parametros
            $emailSQL = mysqli_real_escape_string($this->db, $email);
            $passwordSQL = mysqli_real_escape_string($this->db, $password);

            //Preparamos query
            $queryConsulta = "SELECT * FROM Usuarios WHERE email = '$emailSQL' AND password = '$passwordSQL'";
            //Ejecutamos query
            $resultadoQuery = $this->db->query($queryConsulta);

            //Verificamos que el resultado del query tenga al menos un registro
            if($resultadoQuery && $resultadoQuery->num_rows === 1){
                $usuario = $resultadoQuery->fetch_object();

                //Verificamos la contraseña
                if($password == $usuario->password){
                    //Regresamos el objeto completo
                    $resultado = $usuario;
                }
            }
            return $resultado;
        }
    }

?>