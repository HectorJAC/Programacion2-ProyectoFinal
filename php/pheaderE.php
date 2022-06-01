<?php
    include_once("conexiondb.php");
    include_once("consultas.php");


    if (isset($_SESSION['estudianteid'])) {
        $cUsuario = $_SESSION['estudianteid'];
        $row = consultarUsuarioE($link, $cUsuario);
    } else {
        $_SESSION['mensajeTexto'] = "Error: acceso al sistema no registrado, acceso denegado";
        $_SESSION['mensajeTipo'] = "is-danger";
        header("Location: ../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Style Bulma -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <!-- link rel="stylesheet" href="bulma/css/bulma.min.css" -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/trabajo final/library/fontawesome/css/all.min.css">

    <title> Proyecto Final </title>
</head>

<body>

    <!-- Barra de Menu -->
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="field is-grouped">
                    <p class="control">
                        <a class="button is-light" href="#">
                            <span class="icon">
                                <i class="fas fa-user"></i>
                            </span>
                            <span>
                                Estudiante: <?php echo utf8_decode($row['nombre']); ?>  <?php echo utf8_decode($row['apellido']); ?>
                            </span>
                        </a>

                        <a class="button is-primary" href="/trabajo final/php/cerrar.php">
                            <span class="icon">
                                <i class="fas fa-sign-out-alt"></i>
                            </span>
                            <span> Cerrar Sesion </span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    </nav>

    <!-- Header -->
    <section class="hero is-link">
    <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Proyecto Final de Programacion 2
      </h1>
      <h2 class="subtitle">
        To-Do. Vista Profesor-Estudiante
      </h2>
    </div>
  </div>
</section>

    <!-- Cuerpo -->
    <section class ="section">
        <div class="columns is-multiline is-mobile">
            <div class="column is-one-quarter">
                <!-- trabajar con menu-->
                <aside class="menu">
                    <p class="menu-label">
                        Lista de acciones 
                    </p>
                    <ul class="menu-list">
                        <li> <a href="/trabajo final/acciones/asig-mant.php"> Realizar una tarea </a></li>
                    </ul>
                </aside>
            </div>
