<?php
require_once dirname(__DIR__) . '/estudiantes_app/db/conexion_db.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/i_controller.php';
require_once dirname(__DIR__) . '/estudiantes_app/models/estudiantes.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/estudiantes_controller.php';

use controllers\EstudianteController;

$estudianteController = new EstudianteController();
$id = empty($_GET['idE']) ? 0 : $_GET['idE'];
$resultado = $estudianteController->delete($id);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>
    </head>
    <body>
        <h1>Resultados de la operación</h1>
        <?php
            if($resultado){
                echo '<p>Se eliminó el registro</p>';
            } else {
                echo '<p>Se presentó un error al guardar los datos. Vuelva a intentar.</p>';
            }
            echo '<br>';
            echo '<a href="index.php">Volver a la lista</a>';
        ?>
    </body>
</html>  
