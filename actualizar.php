<?php
    require_once "class/Crud.php";
    $crud = new Crud();
    $id = $_POST['idActualizar'];
    $datos = $crud->obtenerDocumento($id);
    $idMongo = new MongoDB\BSON\ObjectId($datos->_id);
    //print_r($datos);
?>

<?php require_once 'header.php'; ?>

<div class="jumbotron jumbotron-fluid">
    <div class="container border border-dark rounded" style="background-color: orange;">
        <h1 class="display-4 text-center"><b>Actualizar Registro</b></h1>
        <hr style="background-color: black;">
        <p class="lead">
            <form action="procesos/actualizar.php" method="POST" class="alert alert-warning border border-dark" role="alert">
                <input type="text" name="idActualizar" hidden value="<?php echo $idMongo; ?>">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $datos-> nombre; ?>" class="form-control border border-dark" required placeholder="Aqui va tu nombre">
                <br>
                <label for="nombre">Apellido Paterno:</label>
                <input type="text" name="apellidoP" value="<?php echo $datos-> paterno; ?>" class="form-control border border-dark" required placeholder="Aqui va tu apellido paterno">
                <br>
                <label for="nombre">Apellido Materno:</label>
                <input type="text" name="ApellidoM" value="<?php echo $datos-> materno; ?>" class="form-control border border-dark" required placeholder="Aqui va tu apellido materno">
                <br>
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="fechaNac" value="<?php echo $datos-> fecha_nacimiento; ?>" class="form-control border border-dark" required placeholder="Aqui va tu fecha de nacimiento">
                <br>
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <form action="procesos/actualizar.php" method="POST">
                            <input type="text" hidden name="idActualizar" value="<?php echo $idMongo; ?>">
                            <button class="btn btn-success border border-dark" id="btn_actualizar"><i class="fas fa-sync"></i>&nbsp Actualizar</button>
                        </form>
                    </div>
                    <div class="col-sm-6 text-center"><a href="index.php" class="btn btn-info border border-dark"><i class="fas fa-undo"></i>&nbsp Regresar</a></div>
                </div>
            </form>
        </p>
    </div>
</div>

<?php require_once 'scripts.php'; ?>