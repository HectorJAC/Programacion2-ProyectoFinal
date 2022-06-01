<?php
    if (!empty($_GET['id'])) {
        include_once('../php/pheader.php');
        $id = $_GET['id'];
        $row = consultarUsuarios($link, $id);

    } else {
        session_start();
        $_SESSION['mensajeTexto'] = "Advertencia: Accion realizada no permitida";
        $_SESSION['mensajeTipo'] = "is-warning";
        header("Location: ./profesor-mant.php");
    }
    $resultado = mostrarTipos($link);

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
        <h2 class="subtitle">Base de datos - Mantenimiento de Crear Usuarios - Editar registro</h2>
    </div>

    <!-- Contenido -->
    <div class="block">

        <div class="columns">
            <div class="column is-12">
                <form action="profesor-crud.php?accion=UDT" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="id" id="id" value="<?php echo $row['profesorid']; ?>">
                <div class="field">
                    <label class="label"> Nombre </label>
                    <div class="control">
                        <input class="input" type="text" name="username" 
                        id="username" placeholder="Descripcion"  value="<?php echo $row['username']; ?>" require>
                    </div>

                    <div class="field">
                    <label class="label"> Apellido </label>
                    <div class="control">
                        <input class="input" type="text" name="apellido" 
                        id="apellido" placeholder="Apellido"  value="<?php echo $row['apellido']; ?>" require>
                    </div>

                    <div class="field">
                    <label class="label"> Correo </label>
                    <div class="control">
                        <input class="input" type="email" name="email" 
                        id="email" placeholder="kola@ucateci.com"  value="<?php echo $row['email']; ?>" require>
                    </div>

                    <div class="field">
                    <label class="label"> Contraseña </label>
                    <div class="control">
                        <input class="input" type="password" name="password" 
                        id="password" value="<?php echo $row['password']; ?>" require>
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
                        <a class="button is-light" href="profesor-mant.php"> Regresar </a>
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