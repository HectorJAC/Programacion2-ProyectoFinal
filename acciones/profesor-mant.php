<?php
include_once('../php/pheader.php');

$resultado = mostrarTipos($link);
$resultadoUsuarios = mostrarUsuarios($link);

?>

<div class="column is-half">
    <!-- Migas de Pan -->
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
        <li><a href="../pbody.php"> Inicio </a></li>
            <li class="is-active"><a href="#" aria-current="page">Unidad 04: Base de datos</a></li>
        </ul>
    </nav>
    <!-- Titulos -->
    <div class="block">
        <h1 class="title">Unidad 04:</h1>
        <h2 class="subtitle">Base de datos</h2>
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
                <form action="profesor-crud.php?accion=INS" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="field">
                    <label class="label"> Nombre </label>
                    <div class="control">
                        <input class="input" type="text" name="username" id="username" placeholder="Nombre" require>
                    </div>
                </div>

                <div class="field">
                    <label class="label"> Apellido </label>
                    <div class="control">
                        <input class="input" type="text" name="apellido" id="apellido" placeholder="Apellido" require>
                    </div>
                </div>

                <div class="field">
                    <label class="label"> Correo </label>
                    <div class="control">
                        <input class="input" type="email" name="email" id="email" placeholder="kola@ucateci.com" require>
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
                        <thead>
                            <th> Id del profesor </th>
                            <th> Nombre </th>
                            <th> Apellido </th>
                            <th> Correo </th>
                            <th> Estado </th>
                        </thead>
                        <tbody>
                        <?php  
                            while ($row = mysqli_fetch_array($resultadoUsuarios, MYSQLI_ASSOC)) { ?>
                                <tr>
                                    <td> <?php echo $row['profesorid'] ?> </td>
                                    <td> <?php echo $row['username'] ?> </td>
                                    <td> <?php echo $row['apellido'] ?> </td>
                                    <td> <?php echo $row['email'] ?> </td>
                                    <td> <?php echo $row['estado'] ?> </td>
                                    <td> <a class="button is-info" data-toggle="tooltip" data-placement="top" title="Editar" name="editar" 
                                    href="profesor-editar.php?accion=UDT&id=<?php echo $row['profesorid'] ?>"> <i class="fas fa-edit"></i> </a> </td>

                                    <td> <a class="button is-danger" data-toggle="tooltip" data-placement="top" title="Anular" name="anular" 
                                    href="profesor-crud.php?accion=DLT&id=<?php echo $row['profesorid'] ?>"> <i class="fas fa-trash"></i> </a> </td>
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