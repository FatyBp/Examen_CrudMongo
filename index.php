<?php
    session_start();
    require_once "class/Crud.php"; 
    $objeto = new Crud();
    $datos = $objeto->mostrar();
    // $mensaje = $objeto->mensajesCrud($_SESSION['mensaje_crud']);
    unset($_SESSION['mensaje_crud']);
?>
<?php require_once "header.php"; ?>

<div class="jumbotron jumbotron-fluid" style="background:linear-gradient(30deg, crimson,sienna, royalblue, indianred, purple);
">
    <div class="container rounded" style="background:linear-gradient(30deg, crimson,sienna, royalblue, indianred, purple);
">
        <br>
        <h1 class="display-4 text-center"><i class="fas fa-users"></i><b>  CRUD con PHP y MongoDB</b></h1>
        <p class="lead">

            <a href="agregar.php" class="btn btn-success"><i class="fas fa-user-friends"></i>  Agregar Persona</a>
            <table class="table table-responsive">
                <table class="table table-hover  table-striped text-center" id="idDatatable" 
                style="background:linear-gradient(30deg, crimson,sienna, royalblue, indianred, purple);">
                    <thead>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Editar Datos</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($datos as $key): 
                            $idMongo = new MongoDB\BSON\ObjectId($key->_id);
                        ?>
                        <tr>
                            <td><?php echo $key->nombre; ?></td>
                            <td><?php echo $key->paterno; ?></td>
                            <td><?php echo $key->materno; ?></td>
                            <td><?php echo $key->fecha_nacimiento; ?></td>
                            <td>
                                <form action="actualizar.php" method="POST">
                                    <input type="text" name="idActualizar" hidden value="<?php echo $idMongo ?>">
                                    <button class="btn btn-warning"><i class="fab fa-leanpub"></i>  Editar</button>
                                </form>
                            </td>
                            <td>
                                <form action="eliminar.php" method="POST">
                                    <input type="text" name="_id" hidden value="<?php echo $idMongo ?>">
                                    <button class="btn btn-danger"><i class="fas fa-user-slash"></i> Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </table>
        </p>
    </div>
</div>

<?php require_once 'scripts.php'; ?>
