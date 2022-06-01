<?php
    if (!empty($_GET['tareaid'])) {
        include_once('../php/pheaderE.php');
        $id = $_GET['tareaid'];
        $row = consultarTiposE($link, $id);

    } else {
        session_start();
        $_SESSION['mensajeTexto'] = "Advertencia: Accion realizada no permitida";
        $_SESSION['mensajeTipo'] = "is-warning";
        header("Location: ./asig-mant.php");
    }

?>

<div class="column is-half">
    <!-- Migas de Pan -->
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
        <li><a href="../pbodyE.php"> Inicio </a></li>
            <li class="is-active"><a href="#" aria-current="page"> To-Do: Realizar Tareas </a></li>
        </ul>
    </nav>
    <!-- Titulos -->
    <div class="block">
        <h1 class="title"> To-Do </h1>
        <h2 class="subtitle"> Tareas - Realizacion de Tareas </h2>
    </div>

    <!-- Contenido -->
    <div class="block">
        <div class="columns">
            <div class="column is-12">
                <form action="asig-crud.php?accion=UDT" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="tareaid" id="tareaid" value="<?php echo $row['tareaid']; ?>">
                <div class="field">
                <label class="label"> Contenido </label>
                    <div class="control">
                        <input class="input" type="text" name="contenido" id="contenido" value="<?php echo $row['contenido']; ?>" require>
                    </div>
                </div>

                <div class="field">
                    <label class="label"> Estado de la tarea </label>
                    <div class="control">
                        <div class="select">
                            <select name="estado_tarea" id="estado_tarea">
                                <option value="Entregada" <?php  
                                    if ($row['estado_tarea'] = "Entregada") {
                                        echo 'selected';
                                    }
                                ?>> Entregada </option>
                                <option value="No entregada" <?php  
                                    if ($row['estado_tarea'] = "No entregada") {
                                        echo 'selected';
                                    }
                                ?>> No entregada </option>
                            </select>
                        </div>
                    </div>
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
                        <a class="button is-light" href="asig-mant.php"> Regresar </a>
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