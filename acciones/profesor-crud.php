<?php
    try {
        include_once("../php/conexiondb.php");

        if (!empty($_GET['accion'])) {
            $opcion = $_GET['accion'];
        } else {
            session_start();
            $_SESSION['mensajeTexto'] = "Advertencia: Accion realizada no permitida";
            $_SESSION['mensajeTipo'] = "is-warning";
            header("Location: ./profesor-mant.php");
        }

        // CRUD - INS - DLT - UDT
        switch ($opcion) {
            case 'INS':
                if (isset($_POST['guardar'])) {
                    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
                    $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
                    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

                    // Encriptar datos
                    $hash_passcode = password_hash($password, PASSWORD_DEFAULT);

                    $query = "
                        INSERT INTO `profesores`(`username`, `apellido`, `email`, `password`, `estado`) 
                        VALUES ('$username', '$apellido', '$email', '$hash_passcode', 'Activo')
                    ";
                }

                $resultado = mysqli_query($link, $query);

                if (!$resultado) {
                    $_SESSION['mensajeTexto'] = "Error Insertando el Registro";
                    $_SESSION['mensajeTipo'] = "is-danger";
                    //header("Location: ./profesor-mant.php");
                    die("Error en base de datos: " . mysqli_error($link));
                } else {
                    $_SESSION['mensajeTexto'] = "Registro almacenado con Exito";
                    $_SESSION['mensajeTipo'] = "is-success";
                    header("Location: ./profesor-mant.php");
                }
                // cerrar la conexion
                mysqli_close($link);

                break;
            
                case 'DLT':
                        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    
                        // $query = " DELETE FROM `grupo` WHERE `grupoid` = '$id' ";
                        $query = " UPDATE `profesores` SET `estado` = 'Inactivo' WHERE `profesorid` = '$id' ";
    
                        $resultado = mysqli_query($link, $query);
    
                    if (!$resultado) {
                        $_SESSION['mensajeTexto'] = "Error Borrando el Registro";
                        $_SESSION['mensajeTipo'] = "is-danger";
                        header("Location: ./profesor-mant.php");
                        // die("Error en base de datos: " . mysqli_error($link));
                    } else {
                        $_SESSION['mensajeTexto'] = "Registro borrado con Exito";
                        $_SESSION['mensajeTipo'] = "is-success";
                        header("Location: ./profesor-mant.php");
                    }
                    // cerrar la conexion
                    mysqli_close($link);
    
                    break;

                    case 'UDT':
                        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
                        $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
                        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

                        // Encriptar datos
                        $hash_passcode = password_hash($password, PASSWORD_DEFAULT);

                        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
                        $estado = filter_var($_POST['estado'], FILTER_SANITIZE_STRING);
    
                        // $query = " DELETE FROM `grupo` WHERE `grupoid` = '$id' ";
                        $query = " UPDATE `profesores` SET `username` = '$username', `apellido` = '$apellido', `email` = '$email',
                        `password` = '$hash_passcode', `estado` = '$estado' WHERE `profesorid` = '$id' ";

                        $resultado = mysqli_query($link, $query);
    
    
                    if (!$resultado) {
                        $_SESSION['mensajeTexto'] = "Error Actualizando el Registro";
                        $_SESSION['mensajeTipo'] = "is-danger";
                        //header("Location: ./profesor-mant.php");
                        die("Error en base de datos: " . mysqli_error($link));
                    } else {
                        $_SESSION['mensajeTexto'] = "Registro Actualizado con Exito";
                        $_SESSION['mensajeTipo'] = "is-success";
                        header("Location: ./profesor-mant.php");
                        //die("Error en base de datos: " . mysqli_error($link));
                    }
                    // cerrar la conexion
                    mysqli_close($link);
    
                    break;


            default:
                $_SESSION['mensajeTexto'] = "Advertencia: Accion realizada no identificada";
                $_SESSION['mensajeTipo'] = "is-warning";
                header("Location: ./profesor-mant.php");
                // die("Error en base de datos: " . mysqli_error($link));
                break;
        }
    } catch (Exception $e) {
        print "Exception no controlada 01: " . $e->getMessage();
        print "Estamos trabajando en la solucion";
    } catch (Error $e) {
        print "Error no controlada 01: " . $e->getMessage();
        print "Estamos trabajando en la solucion";
    }

