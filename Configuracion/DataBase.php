<?php
    //Clase para la conexion a la base de datos
    class DataBase{
        //Metodo estatico de conexion a la basse de datos
        public static function conexion(){
            $db = new mysqli("localhost", "root", "admin", "Tienda");
            return $db;
        }
    }
?>
