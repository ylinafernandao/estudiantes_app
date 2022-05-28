<?php
require_once dirname(__DIR__) . '/estudiantes_app/db/conexion_db.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/m_controller.php';
require_once dirname(__DIR__) . '/estudiantes_app/models/materias.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/materias_controller.php';

use controllers\MateriaController;

$materiaController = new MateriaController();


$id = empty($_GET['idE']) ? null : $_GET['idE'];
$tituloForm = empty($id) ? "Registrar" : "Modificar";
$actionForm  = empty($id) ? "registrar.php" : "actualizar.php";

$materiaModel = empty($id) ? null : $materiaController->detail($id);

$materia = [
    'codigo' => $materiaModel == null ? '' : $materiaModel->get('codigo'),
    'nombre' => $materiaModel == null ? '' : $materiaModel->get('nombre'),
];
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Formulario Materias</title>
    </head>

    <body>
        <h1><?php echo $tituloForm; ?>Materia</h1>
        <br>
        <a href="indexM.php">Volver</a>
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
                value=" <?php echo $materia['codigo'] ?> " required>
            </div>
            <div>
                <label for="nombreInput">Nombre:</label>
                <input id="nombreInput" name="nombreInput" type="text"
                value=" <?php echo $materia['nombre'] ?> " required>
            </div>
            <div>
                <button type="submit">Guardar</button>
            </div>
        </form>
    </body>
</html>