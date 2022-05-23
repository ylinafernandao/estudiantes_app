<?php
require_once dirname(__DIR__) . '/estudiantes_app/db/conexionM_db.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/m_controller.php';
require_once dirname(__DIR__) . '/estudiantes_app/models/materia.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/materias_controller.php';

use controllers\MateriaController;
$materiaController = new MateriaController();
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Estudiantes</title>
    </head>

    <body>
        <h1>Lista de Materias</h1>
        <a href="form_materias.php">Registrar nueva materia</a>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Materia</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $materias = $materiaController->list();
                if(count($materias)>0){
                    foreach($materias as $materias){
                        echo '<tr>';
                        echo ' <td>' . $materias->get('codigo') . '</td>';
                        echo ' <td>' . $materias->get('nombre') . '</td>';
                        echo ' <td>';
                        echo '   <a href="form_materias.php?idE=' . $materias->get('id') . '">Modificar</a>';
                        echo ' </td>';
                        echo ' <td>';
                        echo '   <a href="eliminarM.php?idE=' . $materias->get('id') . '">Eliminar</a>';
                        echo ' </td>';
                        echo '</tr>';
                    }
                }else{
                    echo '<tr>';
                    echo ' <td colspan="3">No hay registros</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </body>
</html>