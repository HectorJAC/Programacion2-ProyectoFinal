<?php
    try {
        include_once("../php/conexiondb.php");

        if (!empty($_GET['accion'])) {
            $opcion = $_GET['accion'];
        } else {
            session_start();
            $_SESSION['mensajeTexto'] = "Advertencia: Accion realizada no permitida";
            $_SESSION['mensajeTipo'] = "is-warning";
            header("Location: ./estudiante-mant.php");
        }

        // CRUD - INS - DLT - UDT
        switch ($opcion) {
            case 'INS':
                if (isset($_POST['guardar'])) {
                    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
                    $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
                    $correo = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
                    $contraseña = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

                    $hash_passcode = password_hash($contraseña, PASSWORD_DEFAULT);

                    $query = "
                        INSERT INTO `estudiantes`(`nombre`,`apellido`, `email`, `password`,  `estado`) 
                        VALUES ('$nombre', '$apellido', '$correo', '$hash_passcode', 'Activo')
                    ";
                }

                $resultado = mysqli_query($link, $query);

                if (!$resultado) {
                    $_SESSION['mensajeTexto'] = "Error Insertando el Registro";
                    $_SESSION['mensajeTipo'] = "is-danger";
                    header("Location: ./estudiante-mant.php");
                    // die("Error en base de datos: " . mysqli_error($link));
                } else {
                    $_SESSION['mensajeTexto'] = "Registro almacenado con Exito";
                    $_SESSION['mensajeTipo'] = "is-success";
                    header("Location: ./estudiante-mant.php");
                }
                // cerrar la conexion
                mysqli_close($link);

                break;
            
                case 'DLT':
                        $id = filter_var($_GET['estudianteid'], FILTER_SANITIZE_NUMBER_INT);
    
                        // $query = " DELETE FROM `grupo` WHERE `grupoid` = '$id' ";
                        $query = " UPDATE `estudiantes` SET `estado` = 'Inactivo' WHERE `estudianteid` = '$id' ";
    
                        $resultado = mysqli_query($link, $query);
    
                    if (!$resultado) {
                        $_SESSION['mensajeTexto'] = "Error Borrando el Registro";
                        $_SESSION['mensajeTipo'] = "is-danger";
                        header("Location: ./estudiante-mant.php");
                        // die("Error en base de datos: " . mysqli_error($link));
                    } else {
                        $_SESSION['mensajeTexto'] = "Registro borrado con Exito";
                        $_SESSION['mensajeTipo'] = "is-success";
                        header("Location: ./estudiante-mant.php");
                    }
                    // cerrar la conexion
                    mysqli_close($link);
    
                    break;

                    case 'UDT':
                        $id = filter_var($_POST['estudianteid'], FILTER_SANITIZE_NUMBER_INT);
                        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
                        $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
                        $correo = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
                        $contraseña = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

                        $hash_passcode = password_hash($contraseña, PASSWORD_DEFAULT);

                        $estado = filter_var($_POST['estado'], FILTER_SANITIZE_STRING);

                        // $query = " DELETE FROM `grupo` WHERE `grupoid` = '$id' ";
                        $query = " UPDATE `estudiantes` SET `nombre` = '$nombre', `apellido` = '$apellido', `email` = '$correo', 
                        `password` = '$hash_passcode', `estado` = '$estado' WHERE `estudianteid` = '$id' ";
    
                        $resultado = mysqli_query($link, $query);
    
                    if (!$resultado) {
                        $_SESSION['mensajeTexto'] = "Error Actualizando el Registro";
                        $_SESSION['mensajeTipo'] = "is-danger";
                        //header("Location: ./estudiante-mant.php");
                        die("Error en base de datos: " . mysqli_error($link));
                    } else {
                        $_SESSION['mensajeTexto'] = "Registro Actualizado con Exito";
                        $_SESSION['mensajeTipo'] = "is-success";
                        header("Location: ./estudiante-mant.php");
                    }
                    // cerrar la conexion
                    mysqli_close($link);
    
                    break;


            default:
                $_SESSION['mensajeTexto'] = "Advertencia: Accion realizada no identificada";
                $_SESSION['mensajeTipo'] = "is-warning";
                header("Location: ./estudiante-mant.php");
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
