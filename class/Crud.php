<?php
    require_once "Conexion.php";

    class Crud {
        public function mostrar(){
            try {
                $conexion = Conexion::conectar();
                $coleccion = $conexion->personas;
                $datos = $coleccion->find();
                return $datos;
            } catch (\Throwable $th) {
                return $th;
            }
        }

        public function insertarDatos($datos){
            try {
                $conexion = Conexion::conectar();
                $coleccion = $conexion->personas;
                $resultado = $coleccion->insertOne(["nombre"=>$datos['nombre'], "paterno"=>$datos['paterno'], "materno"=>$datos['materno'], "fecha_nacimiento"=>$datos['fecha_nacimiento']]);
                return $resultado;
            } catch (\Throwable $th) {
                return $th;
            }
        }

        public function obtenerDocumento($id){
            try {
                $conexion = Conexion::conectar();
                $coleccion = $conexion->personas;
                $datos = $coleccion->findOne(array('_id' => new MongoDB\BSON\ObjectId($id)));
                return $datos;
            } catch (\Throwable $th) {
                return $th;
            }
        }
        public function eliminar($id){
            try{
                $conexion = Conexion::conectar();
                $coleccion = $conexion->personas;
                $eliminar = $coleccion->deleteOne(array('_id' => new MongoDB\BSON\ObjectId($id)));
                return $eliminar;
            }catch(\Throwable $th){
                return $th;
            }
        }
        
        public function actualizar($datos){
            try {
                $conexion = Conexion::conectar();
                $coleccion = $conexion->personas;
                $resultado = $coleccion->updateOne(
                    ['_id' => new MongoDB\BSON\ObjectId($datos['_id'])],
                        ['$set' => [
                            "nombre"=>$datos['nombre'], 
                            "paterno"=>$datos['paterno'], 
                            "materno"=>$datos['materno'], 
                            "fecha_nacimiento"=>$datos['fecha_nacimiento']
                        ],
                    ]
                );
                return $resultado;
            } catch (\Throwable $th) {
                return $th;
            }
        }
        public function mensajesCrud($mensaje){
            $msg = '';
            if ($mensaje == "insert") {
                $msg = 'swal("Datos Guardados", "Registro Agregado Exitosamente", "success");';
            } else if ($mensaje == "update"){
                $msg = 'swal("Datos Actualizados", "Registro Actualizado Exitosamente", "success");';
            } else if ($mensaje == "delete"){
                $msg = 'swal("Datos Eliminados", "Registro Eliminado Exitosamente", "success");';
            }
            return $msg;
        }
    }
?>