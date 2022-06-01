<?php

class Conexion{

    protected $db;
    private $drive ="mysql";
    private $host ="localhost";
    private $bd = "notas";
    private $usuario ="adminProycto1";
    private $contrasena = "adminProycto1";

    public function __construct(){
        try {
            $db = new PDO ("{$this->drive}:host={$this->host};dbname={$this->bd}",
                                    $this->usuario, $this->contrasena);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            echo "Ha surgido un error al tratar de conectarse a la base de datos" . $e->getMessage();
            
        }
    }
}

?>