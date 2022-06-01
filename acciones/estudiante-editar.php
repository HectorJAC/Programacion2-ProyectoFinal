<?php
    if (!empty($_GET['estudianteid'])) {
        include_once('../php/pheader.php');
        $id = $_GET['estudianteid'];
        $row = consultarTipos($link, $id);

    } else {
        session_start();
        $_SESSION['mensajeTexto'] = "Advertencia: Accion realizada no permitida";
        $_SESSION['mensajeTipo'] = "is-warning";
        header("Location: ./estudiante-mant.php");
    }

?>

<div class="column is-half">
    <!-- Migas de Pan -->
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
        <li><a href="../pbody.php"> Inicio </a></li>
            <li class="is-active"><a href="#" aria-current="page"> To-Do: Agregar estudiantes </a></li>
        </ul>
    </nav>
    <!-- Titulos -->
    <div class="block">
        <h1 class="title"> To-Do </h1>
        <h2 class="subtitle"> Estudiantes - Mantenimiento de Estudiantes - Editar registros </h2>
    </div>

    <!-- Contenido -->
    <div class="block">

        <div class="columns">
            <div class="column is-12">
                <form action="estudiante-crud.php?accion=UDT" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="estudianteid" id="estudianteid" value="<?php echo $row['estudianteid']; ?>">
                <div class="field">
                    <label class="label"> Nombre </label>
                    <div class="control">
                        <input class="input" type="text" name="nombre" id="nombre" placeholder="Juan" value="<?php echo $row['nombre']; ?>" require>
                    </div>
                </div>

                    <label class="label"> Apellido </label>
                    <div class="control">
                        <input class="input" type="text" name="apellido" id="apellido" placeholder="García" value="<?php echo $row['apellido']; ?>" require>
                    </div>
                    
                    <label class="label"> Correo </label>
                    <div class="control">
                        <input class="input" type="email" name="email" id="email" placeholder="juan123@ucateci.com" value="<?php echo $row['email']; ?>" require>
                    </div>

                    <label class="label"> Contraseña </label>
                    <div class="control">
                    <input class="input" type="password" name="password" id="password" value="<?php echo $row['password']; ?>" require>
                    </div>

                <div class="field">
                    <label class="label"> Estado </label>
                    <div class="control">
                        <div class="select">
                            <select name="estado" id="estado">
                                <option value="Activo" <?php  
                                    if ($row['estado'] = "Activo") {
                                        echo 'selected';
                                    }
                                ?>> Activo </option>
                                <option value="Inactivo" <?php  
                                    if ($row['estado'] = "Inactivo") {
                                        echo 'selected';
                                    }
                                ?>> Inactivo </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field is-grouped">
                    <p class="control">
                        <input class="button is-primary" type="submit" value="Guardar" name="guardar"> 
                    </p>
                    <p class="control">
                        <a class="button is-light" href="estudiante-mant.php"> Regresar </a>
                    </p>
                </div>
            </form>

            </div>

         
        </div>


    </div>
</div>

<?php
include_once('../php/pfooter.php');
?>