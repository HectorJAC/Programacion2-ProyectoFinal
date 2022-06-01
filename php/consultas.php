<?php 
    function validarLogin($link, $user, $pass)
    {
        // $query = "SELECT * FROM `usuario` WHERE `email` = '$user' AND `password` = '$pass' AND `estado` = 'A' ";
        $query = "SELECT * FROM `profesores` WHERE `email` = '$user' AND `estado` = 'Activo' ";
        $resultado = mysqli_query($link, $query);

        if (mysqli_num_rows($resultado) == 1) {
            $row = $resultado -> fetch_assoc();

            $hash = $row['password'];
            if(password_verify($pass, $hash)) {
                $_SESSION['profesorid'] = $row['profesorid'];
                //eliminar contenido de sesion
                $_SESSION['mensajeTexto'] = null;
                $_SESSION['mensajeTipo'] = null;
                header("Location: ./pbody.php");
            } else {
                $_SESSION['mensajeTexto'] = "Error: contraseña incorrecta";
                $_SESSION['mensajeTipo'] = "is-danger";
            }

        } else {
            $_SESSION['mensajeTexto'] = "Error: correo incorrecto";
            $_SESSION['mensajeTipo'] = "is-danger";
        }
    }

    function validarLoginE($link, $user, $pass)
    {
        // $query = "SELECT * FROM `usuario` WHERE `email` = '$user' AND `password` = '$pass' AND `estado` = 'A' ";
        $query = "SELECT * FROM `estudiantes` WHERE `email` = '$user' AND `estado` = 'Activo' ";
        $resultado = mysqli_query($link, $query);

        if (mysqli_num_rows($resultado) == 1) {
            $row = $resultado -> fetch_assoc();

            $hash = $row['password'];
            if(password_verify($pass, $hash)) {
                $_SESSION['estudianteid'] = $row['estudianteid'];
                //eliminar contenido de sesion
                $_SESSION['mensajeTexto'] = null;
                $_SESSION['mensajeTipo'] = null;
                header("Location: ./pbodyE.php");
            } else {
                $_SESSION['mensajeTexto'] = "Error: contraseña incorrecta";
                $_SESSION['mensajeTipo'] = "is-danger";
            }

        }
    }

    function consultarUsuario($link, $id)
    {
        $query = "SELECT * FROM `profesores` WHERE `profesorid` = '$id' AND `estado` = 'Activo' ";
        $resultado = mysqli_query($link, $query);

        if (mysqli_num_rows($resultado) == 1) {
            $row = $resultado -> fetch_assoc();
            return $row;
        } else {
            $_SESSION['mensajeTexto'] = "Error validando datos de usuario";
            $_SESSION['mensajeTipo'] = "is-danger";

            header("Location: ./index.php");
            
        }
    }

    function consultarUsuarioE($link, $id)
    {
        $query = "SELECT * FROM `estudiantes` WHERE `estudianteid` = '$id' AND `estado` = 'Activo' ";
        $resultado = mysqli_query($link, $query);

        if (mysqli_num_rows($resultado) == 1) {
            $row = $resultado -> fetch_assoc();
            return $row;
        } else {
            $_SESSION['mensajeTexto'] = "Error validando datos de usuario";
            $_SESSION['mensajeTipo'] = "is-danger";

            header("Location: ./index.php");
            
        }
    }


    function mostrarTipos($link)
    {
        $query = "SELECT * FROM `estudiantes` ";
        $resultado = mysqli_query($link, $query);

        return $resultado;
    }

    function mostrarTipost($link)
    {
        $query = "SELECT * FROM `tareas` ";
        $resultado = mysqli_query($link, $query);

        return $resultado;
    }


    function consultarTipos($link, $id)
    {
        $query = "SELECT * FROM `estudiantes` WHERE `estudianteid` = '$id' ";
        $resultado = mysqli_query($link, $query);

        if (mysqli_num_rows($resultado) == 1) {
            $row = $resultado -> fetch_assoc();
            return $row;
        } else {
            $_SESSION['mensajeTexto'] = "Error consultando Datos -> consultarTipos";
            $_SESSION['mensajeTipo'] = "is-danger";

            header("Location: ./index.php");
            
        }
    }

    function consultarTipost($link, $id)
    {
        $query = "SELECT * FROM `tareas` WHERE `tareaid` = '$id' ";
        $resultado = mysqli_query($link, $query);

        if (mysqli_num_rows($resultado) == 1) {
            $row = $resultado -> fetch_assoc();
            return $row;
        } else {
            $_SESSION['mensajeTexto'] = "Error consultando Datos -> consultarTipos";
            $_SESSION['mensajeTipo'] = "is-danger";

            header("Location: ./index.php");
            
        }
    }

    function consultarTiposE($link, $id)
    {
        $query = "SELECT * FROM `tareas` WHERE `tareaid` = '$id' ";
        $resultado = mysqli_query($link, $query);

        if (mysqli_num_rows($resultado) == 1) {
            $row = $resultado -> fetch_assoc();
            return $row;
        } else {
            $_SESSION['mensajeTexto'] = "Error consultando Datos -> consultarTipos";
            $_SESSION['mensajeTipo'] = "is-danger";

            header("Location: ./index.php");
            
        }
    }

    function mostrarUsuarios($link)
    {
        $query = "SELECT * FROM `profesores` ";
        $resultadoUsuarios = mysqli_query($link, $query);

        return $resultadoUsuarios;
    }

    function consultarUsuarios($link, $tipo)
    {
        $query = "SELECT * FROM `profesores` WHERE `profesorid` = '$tipo' ";
        $resultado = mysqli_query($link, $query);

        if (mysqli_num_rows($resultado) == 1) {
            $row = $resultado -> fetch_assoc();
            return $row;
        } else {
            $_SESSION['mensajeTexto'] = "Error consultando Datos -> consultarTipos";
            $_SESSION['mensajeTipo'] = "is-danger";
            die("Error en base de datos: " . mysqli_error($link));

            header("Location: ./index.php");
            
        }
    }
