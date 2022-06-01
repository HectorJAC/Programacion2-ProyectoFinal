<?php
    try {
        include_once("../php/conexiondb.php");

        if (!empty($_GET['accion'])) {
            $opcion = $_GET['accion'];
        } else {
            session_start();
            $_SESSION['mensajeTexto'] = "Advertencia: Accion realizada no permitida";
            $_SESSION['mensajeTipo'] = "is-warning";
            header("Location: ./tareas-mant.php");
        }

        // CRUD - INS - DLT - UDT
        switch ($opcion) {
            case 'INS':
                if (isset($_POST['guardar'])) {
                    $pid = filter_var($_POST['profesorid'], FILTER_SANITIZE_NUMBER_INT);
                    $titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
                    $asignacion = filter_var($_POST['asignacion'], FILTER_SANITIZE_STRING);
                    $contenido = filter_var($_POST['contenido'], FILTER_SANITIZE_STRING);
                    $fecha = filter_var($_POST['fecha_entrega'], FILTER_SANITIZE_NUMBER_INT);

                    $query = "
                        INSERT INTO `tareas`(`profesorid`, `titulo`, `asignacion`, `contenido`, `fecha_entrega`, `estado_tarea`, `estado`) 
                        VALUES ('$pid', '$titulo', '$asignacion', '$contenido', '$fecha', 'No entregada', 'Activo')
                    ";
                }

                $resultado = mysqli_query($link, $query);

                if (!$resultado) {
                    $_SESSION['mensajeTexto'] = "Error Insertando la Tarea";
                    $_SESSION['mensajeTipo'] = "is-danger";
                    header("Location: ./tareas-mant.php");
                    // die("Error en base de datos: " . mysqli_error($link));
                } else {
                    $_SESSION['mensajeTexto'] = "Tarea almacenada con exito";
                    $_SESSION['mensajeTipo'] = "is-success";
                    header("Location: ./tareas-mant.php");
                }
                // cerrar la conexion
                mysqli_close($link);

                break;
            
                case 'DLT':
                        $id = filter_var($_GET['tareaid'], FILTER_SANITIZE_NUMBER_INT);
    
                        //$query = " DELETE FROM `tareas` WHERE `tareaid` = '$id' ";
                        $query = " UPDATE `tareas` SET `estado` = 'Inactivo' WHERE `tareaid` = '$id' ";
    
                        $resultado = mysqli_query($link, $query);
    
                    if (!$resultado) {
                        $_SESSION['mensajeTexto'] = "Error Borrando la Tarea";
                        $_SESSION['mensajeTipo'] = "is-danger";
                        header("Location: ./tareas-mant.php");
                        // die("Error en base de datos: " . mysqli_error($link));
                    } else {
                        $_SESSION['mensajeTexto'] = "Tarea borrada con Exito";
                        $_SESSION['mensajeTipo'] = "is-success";
                        header("Location: ./tareas-mant.php");
                    }
                    // cerrar la conexion
                    mysqli_close($link);
    
                    break;

                    case 'UDT':
                        $id = filter_var($_POST['tareaid'], FILTER_SANITIZE_NUMBER_INT);
                        $titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
                        $asignacion = filter_var($_POST['asignacion'], FILTER_SANITIZE_STRING);
                        $contenido = filter_var($_POST['contenido'], FILTER_SANITIZE_STRING);
                        $fecha = filter_var($_POST['fecha_entrega'], FILTER_SANITIZE_NUMBER_INT);
                        $tarea = filter_var($_POST['estado_tarea'], FILTER_SANITIZE_STRING);
                        $estado = filter_var($_POST['estado'], FILTER_SANITIZE_STRING);
                        // $query = " DELETE FROM `grupo` WHERE `grupoid` = '$id' ";
                        $query = " UPDATE `tareas` SET `titulo` = '$titulo', `asignacion` = '$asignacion', `contenido` = '$contenido', 
                        `fecha_entrega` = '$fecha', `estado_tarea` = '$tarea', `estado` = '$estado' WHERE `tareaid` = '$id' ";
    
                        $resultado = mysqli_query($link, $query);
    
                    if (!$resultado) {
                        $_SESSION['mensajeTexto'] = "Error Actualizando la Tarea";
                        $_SESSION['mensajeTipo'] = "is-danger";
                        //header("Location: ./estudiante-mant.php");
                        die("Error en base de datos: " . mysqli_error($link));
                    } else {
                        $_SESSION['mensajeTexto'] = "Tarea Actualizada con Exito";
                        $_SESSION['mensajeTipo'] = "is-success";
                        header("Location: ./tareas-mant.php");
                    }
                    // cerrar la conexion
                    mysqli_close($link);
    
                    break;


            default:
                $_SESSION['mensajeTexto'] = "Advertencia: Accion realizada no identificada";
                $_SESSION['mensajeTipo'] = "is-warning";
                header("Location: ./tareas-mant.php");
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
