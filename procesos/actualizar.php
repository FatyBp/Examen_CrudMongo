<?php
    session_start();

    require_once "../class/Crud.php";
    $crud = new Crud();
    $datos = array(
        "_id" => $_POST['idActualizar'],
        "nombre" => $_POST['nombre'],
        "paterno" => $_POST['apellidoP'],
        "materno" => $_POST['ApellidoM'],
        "fecha_nacimiento" => $_POST['fechaNac']
    );
    $respuesta = $crud->actualizar($datos);
    if ($respuesta->getModifiedCount() > 0 || $respuesta->getMatchedCount() > 0) {
        $_SESSION['mensaje_crud'] = "update";
        header("location:../index.php");
    }else{
        print_r($respuesta);
    }
?>