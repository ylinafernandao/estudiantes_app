<?php

require_once dirname(__DIR__) . '/estudiantes_app/db/conexion_db.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/m_controller.php';
require_once dirname(__DIR__) . '/estudiantes_app/models/materias.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/materias_controller.php';

use controllers\MateriaController;
use models\Materia;

$materiaController = new MateriaController();

$materia = new Materia();
$materia->set('codigo',$_POST['codigoInput']);
$materia->set('nombre',$_POST['nombreInput']);

$resultado = $materiaController->create($materia);

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
                echo '<p>Registro de materia exitoso</p>';
                echo '<br>';
                echo '<a href="indexM.php">Volver a lista</a>';
            }else{
                echo '<p>Se presentó un error al guardar los datos. Vuelva a intentar.</p>';
                echo '<br>';
                echo '<a href="form_materias.php">Volver</a>';
            }
        ?>
    </body>
</html>
