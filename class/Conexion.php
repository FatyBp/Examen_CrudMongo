<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/mongodb/vendor/autoload.php";

    class Conexion {
        public static function conectar(){
            $servidor = "127.0.0.1";
            $puerto = "27017";
            $usuario = "fatima";
            $password = "123456";
            $BD = "crud";
            $cadenaConexion = "mongodb://". $usuario . ":" . $password . "@" . $servidor . ":" . $puerto . "/" . $BD;
            try{
                $cliente = new MongoDB\Client($cadenaConexion);
                return $cliente->selectDatabase($BD);
            } catch (\Throwable $th){
                return $th;
            }
        }
    }
    //$objeto = new Conexion();
    //print_r($objeto->conectar());
?>