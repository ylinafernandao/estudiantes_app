<?php
require_once dirname(__DIR__) . '/estudiantes_app/db/conexion_db.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/i_controller.php';
require_once dirname(__DIR__) . '/estudiantes_app/models/estudiantes.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/estudiantes_controller.php';

use controllers\EstudianteController;

$estudianteController = new EstudianteController();

$id = empty($_GET['idE']) ? null : $_GET['idE'];
$tituloForm = empty($id) ? "Registrar" : "Modificar";
$actionForm  = empty($id) ? "registrar.php" : "actualizar.php";

$estudianteModel = empty($id) ? null : $estudianteController->detail($id);

$estudiante = [
    'codigo' => $estudianteModel == null ? '' : $estudianteModel->get('codigo'),
    'nombres' => $estudianteModel == null ? '' : $estudianteModel->get('nombres'),
    'apellidos' => $estudianteModel == null ? '' : $estudianteModel->get('apellidos'),
    'edad' => $estudianteModel == null ? 16 : $estudianteModel->get('edad'),
];
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Formulario Estudiantes</title>
    </head>

    <body>
        <h1><?php echo $tituloForm; ?>Estudiante</h1>
        <br>
        <a href="index.php">Volver</a>
        <br><br>
        <form action="<?php echo $actionForm; ?>" method="POST">
            <?php 
            if (!empty($id)){
                echo '<input id="idInput" name="idInput" type="hidden" value="' . $id . '">';
            }
            ?>
            <div>
                <label for="codigoInput">Código:</label>
                <input id="codigoInput" name="codigoInput" type="text"
                value=" <?php echo $estudiante['codigo'] ?> " required>
            </div>
            <div>
                <label for="nombresInput">Nombres:</label>
                <input id="nombresInput" name="nombresInput" type="text"
                value=" <?php echo $estudiante['nombres'] ?> " required>
            </div>
            <div>
                <label for="apellidosInput">Apellidos:</label>
                <input id="apellidosInput" name="apellidosInput" type="text"
                value=" <?php echo $estudiante['apellidos'] ?> " required>
            </div>
            <div>
                <label for="edadInput">Edad:</label>
                <input id="edadInput" name="edadInput" type="number" min="16"
                value=" <?php echo $estudiante['edad'] ?> " required>
            </div>
            <div>
                <button type="submit">Guardar</button>
            </div>
        </form>
    </body>
</html>