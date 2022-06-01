<?php
    try {
        include_once("../php/conexiondb.php");

        if (!empty($_GET['accion'])) {
            $opcion = $_GET['accion'];
        } else {
            session_start();
            $_SESSION['mensajeTexto'] = "Advertencia: Accion realizada no permitida";
            $_SESSION['mensajeTipo'] = "is-warning";
            header("Location: ./asig-mant.php");
        }

        // CRUD - INS - DLT - UDT
        switch ($opcion) {
                    case 'UDT':
                        $id = filter_var($_POST['tareaid'], FILTER_SANITIZE_NUMBER_INT);
                        $contenido = filter_var($_POST['contenido'], FILTER_SANITIZE_STRING);
                        $tarea = filter_var($_POST['estado_tarea'], FILTER_SANITIZE_STRING);
                        $estado = filter_var($_POST['estado'], FILTER_SANITIZE_STRING);
                        // $query = " DELETE FROM `grupo` WHERE `grupoid` = '$id' ";
                        $query = " UPDATE `tareas` SET `contenido` = '$contenido', `estado_tarea` = '$tarea', `estado` = '$estado' 
                        WHERE `tareaid` = '$id' ";
    
                        $resultado = mysqli_query($link, $query);
    
                    if (!$resultado) {
                        $_SESSION['mensajeTexto'] = "Error al Entregar la Tarea";
                        $_SESSION['mensajeTipo'] = "is-danger";
                        //header("Location: ./asig-mant.php");
                        die("Error en base de datos: " . mysqli_error($link));
                    } else {
                        $_SESSION['mensajeTexto'] = "Tarea Entregada con Exito";
                        $_SESSION['mensajeTipo'] = "is-success";
                        header("Location: ./asig-mant.php");
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
