<?php 
namespace controllers;

use controllers\MController;
use db\ConexionDB;
use models\Materia;

class MateriaController implements MController
{
    public function list()
    {
        $sql = "select * from materias";
        $conexionDB = new ConexionDB();
        $resultQuery = $conexionDB->getResultQuery($sql);
        $materias = [];

        if ($resultQuery->num_rows > 0){
            while ($row = $resultQuery->fetch_assoc()) {
                $materia = new Materia();
                $materia->set('id', $row['id']);
                $materia->set('codigo', $row['codigo']);
                $materia->set('nombre', $row['nombre']);

                array_push($materias, $materia);
            }
        }
        $conexionDB->close();
        return $materias;
    }

    public function detail($id)
    {
        $sql = "SELECT * FROM materias WHERE id=" .$id;
        $conexionDB = new ConexionDB();
        $resultQuery = $conexionDB->getResultQuery($sql);
        $materia = null;

        if ($resultQuery->num_rows > 0){
            while ($row = $resultQuery->fetch_assoc()){
                $materia = new Materia();
                $materia->set('id', $row['id']);
                $materia->set('codigo', $row['codigo']);
                $materia->set('nombre', $row['nombre']);
            }
        }
        $conexionDB->close();
        return $materia;  
    }

    public function create($materiaModel)
    {
        $sql = "insert into materias (codigo, nombre)";
        $sql = "values ('" . $materiaModel->get('codigo') . "', 
        '" . $materiaModel->get('nombre') . " )";

        $conexionDB = new ConexionDB();
        $resultQuery = $conexionDB->getResultQuery($sql);
        $conexionDB->close();
        return $resultQuery;  
    }

    public function update($id, $materiaModel)
    {
        $sql = "update materias set ";
        $sql .= " codigo='" . $materiaModel->get('codigo') . "',";
        $sql .= " nombre='" . $materiaModel->get('nombre') . "'";
        $sql .= "where id=" . $id;
        $conexionDB = new ConexionDB();
        $resultQuery = $conexionDB->getResultQuery($sql);
        $conexionDB->close();
        return $resultQuery;
    }

    public function delete($id)
    {
        $sql = "delete from materias where id=" . $id;
        $conexionDB = new ConexionDB();
        $resultQuery = $conexionDB->getResultQuery($sql);
        $conexionDB->close();
        return $resultQuery;
    }
}