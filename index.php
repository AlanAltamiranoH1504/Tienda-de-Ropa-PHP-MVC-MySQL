<?php
    //Iniciamos la sesion
    session_start();
    //Cargamos al autoload
    require_once "AutoLoad.php";
    //Cargamos el archivo de base de datos
    require_once "Configuracion/DataBase.php";
    //Cargamos los helpers
    require_once "Helpers/Utils.php";
    //Cargamos la base URL
    require_once "Configuracion/Parametros.php";
    //Cargamos header y sidebar
    require_once "Vistas/LayOut/Header.php";
    require_once "Vistas/LayOut/SideBar.php";

    //Variable global para conexion a la db
    $db = DataBase::conexion();

    /*CONTROLADOR FRONTAL*/
    //Controlador por defecto
    if(!isset($_GET['controlador'])){
        $controlador = new ControladorProducto();
        $controlador->index();
    } else if(isset($_GET['controlador']) && class_exists($_GET['controlador'])){ //Verificamos que existe el controlador y la clase del controlador
        //Si el controlador existe lo instanciamos
        $controlador = new $_GET['controlador'];

        //Verificamos la existencia del metodo del controlador
        if(isset($_GET['accion']) && method_exists($controlador, $_GET["accion"])){
            //Guardamos la accion
            $accion = $_GET['accion'];

            //Ejecutamos el controlador con su metodo
            $controlador->$accion();
        }else{
            //Controlador de error
            $error = new ControladorEror();
            $error->index();
        }
    }else{
        //Controlador de error
        $error = new ControladorEror();
        $error->index();
    }
    //Cargamos el footer
    require_once "Vistas/LayOut/Footer.php";
?>
