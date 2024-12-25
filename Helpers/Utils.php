<?php
    class Utils{
        //Funcion que elimina la sesion
        public static function deleteSession($nombreSesion){
            if (isset($_SESSION[$nombreSesion])) {
                unset($_SESSION[$nombreSesion]);
            }
            return $nombreSesion;
        }

        //Funcion que muestra todas la categorias en el encabezado
        public static function showCategorias(){
            //Cargamos modelo de categorias
            require_once "Modelos/Categoria.php";
            //Creamos objeto de categorias y ejecutamos metodo listar
            $categoria = new Categoria();
            $categorias = $categoria->listarCategorias();
            return $categorias;
        }
    }
?>
