<?php
include_once('../php/pheader.php');

$resultado = mostrarTipost($link);

?>

<div class="column is-half">
    <!-- Migas de Pan -->
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
        <li><a href="../pbody.php"> Inicio </a></li>
            <li class="is-active"><a href="#" aria-current="page"> To-Do: Agregar tareas </a></li>
        </ul>
    </nav>
    <!-- Titulos -->
    <div class="block">
        <h1 class="title"> To-Do </h1>
        <h2 class="subtitle"> Agregar tareas </h2>
    </div>
    <!-- Mensajes de alertas -->
    <?php
        if (!empty($_SESSION['mensajeTexto'])) { 
    ?>
        <div class="block">
            <div class="container">
                <div class="notification <?php echo $_SESSION['mensajeTipo'] ?>">
                    <button class="delete"></button>
                        <?php echo $_SESSION['mensajeTexto'] ?>
                </div>
            </div>
        </div>
        <?php 
            // session_destroy();
            $_SESSION['mensajeTexto'] = null;
            $_SESSION['mensajeTipo'] = null;
        }    
        ?>
    <!-- Contenido -->
    <div class="block">

        <div class="columns">
            <div class="column is-5">
                <form action="tareas-crud.php?accion=INS" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="profesorid" id="profesorid" value="<?php echo $row['profesorid']; ?>">
                <div class="field">
                    <label class="label"> Titulo </label>
                    <div class="control">
                        <input class="input" type="text" name="titulo" id="titulo" require>
                    </div>
                </div>

                <div class="field">
                    <label class="label"> Asignacion </label>
                    <div class="control">
                        <input class="input" type="text" name="asignacion" id="asignacion" require>
                    </div>
                </div>

                <div class="field">
                    <label class="label"> Contenido </label>
                    <div class="control">
                        <input class="input" type="text" name="contenido" id="contenido" require>
                    </div>
                </div>

                <div class="field">
                <label class="label"> Fecha de entrega </label>
                    <div class="control">
                        <input class="input" type="text" name="fecha_entrega" id="fecha_entrega" require>
                    </div>
                </div>

                <div class="field is-grouped">
                    <p class="control">
                        <input class="button is-primary" type="submit" value="Guardar" name="guardar"> 
                    </p>
                    <p class="control">
                        <input class="button is-light" type="reset" value="Restablecer">
                    </p>
                </div>
            </form>

            </div>

            <div class="column is-12">
                <div class="table-container">
                    <table class="table is-fullwidth">
                        <thead> Tabla de Tareas
                            <th> Id de la tarea </th>
                            <th> Id del profesor </th>
                            <th> Nombre </th>
                            <th> Asignacion </th>
                            <th> Contenido </th>
                            <th> Fecha de entrega </th>
                            <th> Estado de la tarea </th>
                            <th> Estado </th>
                        </thead>
                        <tbody>
                        <?php  
                            while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) { ?>
                                <tr>
                                    <td> <?php echo $row['tareaid'] ?> </td>
                                    <td> <?php echo $row['profesorid'] ?> </td>
                                    <td> <?php echo $row['titulo'] ?> </td>
                                    <td> <?php echo $row['asignacion'] ?> </td>
                                    <td> <?php echo $row['contenido'] ?> </td>
                                    <td> <?php echo $row['fecha_entrega'] ?> </td>
                                    <td> <?php echo $row['estado_tarea'] ?> </td>
                                    <td> <?php echo $row['estado'] ?> </td>
                                    <td> <a class="button is-info" data-toggle="tooltip" data-placement="top" title="Editar" name="editar" 
                                    href="tareas-editar.php?accion=UDT&tareaid=<?php echo $row['tareaid'] ?>"> <i class="fas fa-edit"></i> </a> </td>

                                    <td> <a class="button is-danger" data-toggle="tooltip" data-placement="top" title="Borrar" name="anular" 
                                    href="tareas-crud.php?accion=DLT&tareaid=<?php echo $row['tareaid'] ?>"> <i class="fas fa-trash"></i> </a> </td>
                                </tr>
                        <?php 
                            }   
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>          
        </div>


    </div>
</div>

<?php
include_once('../php/pfooter.php');
?>