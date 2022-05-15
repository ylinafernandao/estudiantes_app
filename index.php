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
        </table>
    </body>
</html>