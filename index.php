<?php
require_once dirname(__DIR__) . '/estudiantes_app/db/conexion_db.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/i_controller.php';
require_once dirname(__DIR__) . '/estudiantes_app/models/estudiantes.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/estudiantes_controller.php';


use controllers\EstudianteController;
$estudianteController = new EstudianteController();


?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Estudiantes</title>
    </head>

    <body>
        <h1>Lista de Estudiantes</h1>
        <a href="form_estudiantes.php">Registrar nuevo estudiante</a>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Estudiante</th>
                    <th>Edad</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $estudientes = $estudianteController->list();
                if(count($estudientes)>0){
                    foreach($estudientes as $estudiente){
                        echo '<tr>';
                        echo ' <td>' . $estudiente->get('codigo') . '</td>';
                        echo ' <td>' . $estudiente->get('nombres') . ' ' . $estudiente->get('apellidos') . '</td>';
                        echo ' <td>' . $estudiente->get('edad') . '</td>';
                        echo ' <td>';
                        echo '   <a href="form_estudiantes.php?idE=' . $estudiente->get('id') . '">Modificar</a>';
                        echo ' </td>';
                        echo ' <td>';
                        echo '   <a href="eliminar.php?idE=' . $estudiente->get('id') . '">Eliminar</a>';
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

        <br><br>
        <form>
        <a href="indexM.php"><input type="button" value="Ir al listado de Materias"></a>
        </form>

    </body>
</html>