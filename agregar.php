<?php require_once 'header.php'; ?>

<div class="jumbotron jumbotron-fluid">
    <div class="container border border-dark rounded" style="background-color: white;">
        <h1 class="display-4 text-center"><b>Agregar Nuevo Registro</b></h1>
        <hr style="background-color: black;">
        <p class="lead">
            <form action="procesos/agregar.php" method="POST" class="alert alert-secondary border border-dark" role="alert">
                <label for="nombre">Agregar Nombre:</label>
                <input type="text" name="nombre" class="form-control border border-dark" required placeholder="Aqui va tu nombre">
                <br>
                <label for="nombre">Agregar Apellido Paterno:</label>
                <input type="text" name="apellidoP" class="form-control border border-dark" required placeholder="Aqui va tu apellido paterno">
                <br>
                <label for="nombre">Agregar Apellido Materno:</label>
                <input type="text" name="ApellidoM" class="form-control border border-dark" required placeholder="Aqui va tu apellido materno">
                <br>
                <label for="fecha_nacimiento">Agregar Fecha de Nacimiento:</label>
                <input type="date" name="fechaNac" class="form-control border border-dark" required placeholder="">
                <br>
                <div class="row">
                    <div class="col-sm-6 text-center"><button class="btn btn-success border border-dark" id="btn_agregar"><i class="fas fa-plus-circle"></i>&nbsp Agregar</button></div>
                    <div class="col-sm-6 text-center"><a href="index.php" class="btn btn-info border border-dark"><i class="fas fa-undo"></i>&nbsp Regresar</a></div>
                </div>
            </form>
        </p>
    </div>
</div>

<?php require_once 'scripts.php'; ?>