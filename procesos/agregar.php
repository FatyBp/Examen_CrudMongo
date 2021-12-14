<?php 
    session_start();

    require_once "../class/Crud.php";
    $crud = new Crud();
    $datos = array("nombre"=>$_POST['nombre'], "paterno"=>$_POST['apellidoP'], "materno"=>$_POST['ApellidoM'],"fecha_nacimiento"=>$_POST['fechaNac']);
    $respuesta = $crud->insertarDatos($datos);

    if($respuesta->getInsertedId() > 0){
        $_SESSION['mensaje_crud'] = "insert";
        header("location:../index.php");
    }else{
        print_r($respuesta);
    }
?>