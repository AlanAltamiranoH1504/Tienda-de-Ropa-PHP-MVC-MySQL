<?php
    //Cargamos el modelo
    require_once "Modelos/Usuario.php";

    class ControladorUsuario{
        //Metodo index
        public function index(){
            echo "<h1>Controlador: ControladoUsuario. Metodo: index</h1>";
        }

        //Metodo registro
        public function registro(){
            //Cargamos vista
            require_once "Vistas/Usuario/Registro.php";
        }
        //Metodo que guarda el usuario en la db
        public function guardar(){
            //Recbimos datos que llegan
            if (isset($_POST["nombre"]) && !empty($_POST['nombre']) && isset($_POST['apellidos']) && !empty($_POST['apellidos']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                //Creamos el usuario y lo guardamos en la db
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);

                $insert = $usuario->save();
                if ($insert){
                    //Creamos sesion
                    $_SESSION['register'] = "Complete";
                    echo "<h1>Registro Completado</h1>";
                }else{
                    //Creamos sesion
                    $_SESSION['register'] = "Failed";
                    echo "<h1>Registro No Completado</h1>";
                }
            }else{
                $_SESSION['register'] = "Failed";
            }
            header("Location: index.php?controlador=ControladorUsuario&accion=registro");
        }

        //Metodo que hace login del usuario al hacer submit en el formulario
        public function login(){
            //Guardamos los parametros del formulario
            if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
                $email = $_POST['email'];
                $password = $_POST['password'];

                //Creamos objeto de Usuario y seteamos valores
                $usuario = new Usuario();
                $usuario->setEmail($email);
                $usuario->setPassword($password);

                //Ejecutamos metodo del modelo
                $consulta = $usuario->login($email, $password);

                //Condicionamos sesiones de usuario
                if($consulta && is_object($consulta)){
                    $_SESSION['identity'] = $consulta;
                    //Creamos sesion si el rol es de administrador
                    if($consulta->rol == "administrador" || $consulta->rol == "Administrador"){
                        $_SESSION['admin'] = true;
                    }
                }else{
                    $_SESSION['error_login'] = "Identificacion Incorrecta";
                }
                //Redirigimos a la base url
                header("Location: index.php?controlador=ControladorProducto&accion=index");
            }
        }

        //Metodo que cierra la sesion
        public function logOut(){
            //Borramos sesion y la destruimos
            unset($_SESSION['identity']);
            session_destroy();
            header("Location: index.php?controlador=ControladorProducto&accion=index");
        }
    }
?>