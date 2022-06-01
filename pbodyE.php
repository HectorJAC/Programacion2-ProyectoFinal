<?php
  include_once('php/pheaderE.php');
?>

<div class="column is-right">

  <!-- Migas de pan -->
  <nav class="breadcrumb" aria-label="breadcrumbs">
    <ul>
      <li><a href="./pbodyE.php"> Inicio </a></li>
    </ul>
  </nav>

<!-- Titulos -->
  <div class="block">
    <h1 class="title"> Proyecto Final </h1>
      <h2 class="subtitle"> To-Do list </h2>
    </div>

  <!-- Contenido -->
  <div class="block">
    <h1> 
      Bienvenido estudiante <?php echo utf8_decode($row['nombre']); ?>  <?php echo utf8_decode($row['apellido']); ?>, 
      para empezar a trabajar ingrese a unos de los apartados de la derecha.
    </h1>
  </div>


  <?php
    include_once('php/pfooter.php');
  ?>