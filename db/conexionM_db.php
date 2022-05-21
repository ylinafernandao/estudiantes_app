<?php 

namespace db;

use mysqli;

class ConexionDBM
{
    private $servidorDB = "localhost:3306";
    private $nombreDB = "materias_db";
    private $usuarioDB = "root";
    private $passwordDB = "";

    private $conn = null; 

    public function __construct()
    {
        $this->conn = new mysqli($this->servidorDB, $this->usuarioDB, $this->passwordDB, $this->nombreDB);
    }

    public function getResultQuery($sql)
    {
        return $this->conn->query($sql);
    }
    
    public function close()
    {
        $this->conn->close();
    
    }
}