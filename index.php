<?php
    include_once("./php/conexiondb.php");
    include_once("./php/consultas.php");

    //Accion luego de presionar el boton de login
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $vUsuario = trim(htmlspecialchars($_POST['username']));
        $vClave = trim(htmlspecialchars($_POST['password']));

        validarLogin($link, $vUsuario, $vClave);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cUsuario = trim(htmlspecialchars($_POST['username']));
            $cClave = trim(htmlspecialchars($_POST['password']));

            validarLoginE($link, $cUsuario, $cClave);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Style Bulma -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css"> -->
    <link rel="stylesheet" href="bulma/css/bulma.min.css"/>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../library/fontawesome/css/all.min.css">

    <title> Login </title>
</head>
<body>
    
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

    <section>
            <div class="column is-mobile">
                <div class="column is-half is-offset-one-quarter">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-2by1">
                                <img src="./img/ucateci.png" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="content">
                            <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data" autocomplete="off" >
                                <div class="field">
                                    <label class="label"> Correo </label>
                                        <div class="control">
                                            <input class="input" type="email" id="username" name="username" placeholder="ej amigo@hotmail.com" required>
                                        </div>
                                </div>

                                <div class="field">
                                    <label class="label"> Contraseña </label>
                                        <div class="control">
                                            <input class="input" type="password" id="password" name="password" placeholder="ej Contraseña" required>
                                        </div>
                                </div>
                                <div class="field">
                                    <button class="button is-success" type="submit" name="ingresar" value="Ingresar"> Ingresar </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                        if (isset($_SESSION['mensajeTexto'])) { 
                    ?>
                            <footer class="card-footer">
                                <div class="container">
                                    <div class="notification <?php echo $_SESSION['mensajeTipo'] ?>">
                                        <button class="delete"></button>
                                        <?php echo $_SESSION['mensajeTexto'] ?>
                                    </div>
                                </div>
                            </footer>
                        <?php } 
                            // session_destroy();
                        ?>
                </div>
            </div>
        </div>



    </section>

    
</div>
</section>

    <section>
        <!-- Footer -->
        <footer class="footer">
            <div class="content has-text-centered">
                <p>
                <strong> Proyecto realizado por: </strong> Hector José Arámboles Castillo, 2019-0821 </a>.
                </p>
            </div>
        </footer>   
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
                const $notification = $delete.parentNode;

                $delete.addEventListener('click', () => {
                    $notification.parentNode.removeChild($notification);
                });
            });
        });
    </script>
</body>
</html>