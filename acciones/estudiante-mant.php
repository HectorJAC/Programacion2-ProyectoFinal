<?php
include_once('../php/pheader.php');

$resultado = mostrarTipos($link);

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
        <h2 class="subtitle"> Agregar estudiantes </h2>
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
                <form action="estudiante-crud.php?accion=INS" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="field">
                    <label class="label"> Nombre </label>
                    <div class="control">
                        <input class="input" type="text" name="nombre" id="nombre" placeholder="Juan" require>
                    </div>
                </div>

                <div class="field">
                    <label class="label"> Apellido </label>
                    <div class="control">
                        <input class="input" type="text" name="apellido" id="apellido" placeholder="García" require>
                    </div>
                </div>

                <div class="field">
                    <label class="label"> Correo </label>
                    <div class="control">
                        <input class="input" type="email" name="email" id="email" placeholder="juan123@ucateci.com" require>
                    </div>
                </div>

                <div class="field">
                    <label class="label"> Contraseña </label>
                    <div class="control">
                    <input class="input" type="password" name="password" id="password" require>
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
                        <thead> Tabla de Estudiantes
                            <th> Id del estudiante </th>
                            <th> Nombre </th>
                            <th> Apellido </th>
                            <th> Correo </th>
                            <th> Estado </th>
                        </thead>
                        <tbody>
                        <?php  
                            while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) { ?>
                                <tr>
                                    <td> <?php echo $row['estudianteid'] ?> </td>
                                    <td> <?php echo $row['nombre'] ?> </td>
                                    <td> <?php echo $row['apellido'] ?> </td>
                                    <td> <?php echo $row['email'] ?> </td>
                                    <td> <?php echo $row['estado'] ?> </td>
                                    <td> <a class="button is-info" data-toggle="tooltip" data-placement="top" title="Editar" name="editar" 
                                    href="estudiante-editar.php?accion=UDT&estudianteid=<?php echo $row['estudianteid'] ?>"> <i class="fas fa-edit"></i> </a> </td>

                                    <td> <a class="button is-danger" data-toggle="tooltip" data-placement="top" title="Borrar" name="anular" 
                                    href="estudiante-crud.php?accion=DLT&estudianteid=<?php echo $row['estudianteid'] ?>"> <i class="fas fa-trash"></i> </a> </td>
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