<?php

    require_once('../../Conexion.php');

    class Administradores extends Conexion{

        public function __construct(){
            $this->db=parent::__construct();
        }
        // INSERT INTO `usuarios` (`ID_USUARIO`, `NOMBRE`, `APELLIDO`, `USUARIO`, `PASSWORD`, `PERFIL`, `ESTADO`) 
        // VALUES (NULL, 'Jhon', 'Rojas', 'jhonjader', '123', 'Administrador', 'Activo');

        public function add($Nombre, $Apellido, $Usuario, $Password){

            $Password_strnog = password_hash($Password,PASSWORD_DEFAULT);

            $statement = $this->db->prepare("INSERT INTO usuarios (NOMBRE, APELLIDO, USUARIO, PASSWORD, PERFIL, 
            ESTADO) VALUES (:Nombre, :Apellido, :Usuario, :Password, 'Administrador' , 'Activo' )");
            $statement->bindParam(':Nombre',$Nombre);
            $statement->bindParam(':Apellido',$Apellido);
            $statement->bindParam(':Usuario',$Usuario);
            $statement->bindParam(':Password',$Password_strnog);
            if ($statement->execute()) {
                header('Location: ../Pages/index.php');
            }else {
                header('Location: ../Pages/add.php');
            }

        }

        public function get(){
            $rows = null;
            $statement = $this->db->prepare("SELECT * FROM usuarios WHERE PERFIL = 'Administrador' ");
            $statement -> execute();
            while ($result = $statement->fetch()) {
                $rows[]=$result;
            }
            return $rows;
        }

        public function getById($Id){
            $rows = null;
            $statement = $this->db->prepare("SELECT * FROM usuarios WHERE PERFIL = 'Administrador' AND ID_USUARIO
            = :Id");
            $statement->bindParam(':Id',$Id);
            $statement->execute();
            while ($result = $statement->fetch()) {
                $rows[]=$result;
            }
            return $rows;
        }

        public function update($Id, $Nombre, $Apellido, $Usuario, $Password, $Estado){

            $Password_strnog = password_hash($Password,PASSWORD_DEFAULT);
            
            $statement = $this->db->prepare("UPDATE usuarios SET NOMBRE = :Nombre, APELLIDO = :Apellido, USUARIO =
            :Usuario, PASSWORD = :Password, ESTADO=:Estado WHERE ID_USUARIO = :Id");
            $statement->bindParam(':Id',$Id);
            $statement->bindParam(':Nombre',$Nombre);
            $statement->bindParam(':Apellido',$Apellido);
            $statement->bindParam(':Usuario',$Usuario);
            $statement->bindParam(':Password',$Password_strnog);
            $statement->bindParam(':Estado',$Estado);
            if ($statement->execute()) {
                header('Location: ../Pages/index.php');
            } else {
                header('Location: ../Pages/edit.php');
            }  
        }

        public function delete($Id){
            $statement = $this->db-> prepare("DELETE FROM usuarios WHERE ID_USUARIO = :Id");
            $statement->bindParam(':Id',$Id);
            if ($statement->execute()) {
                header('Location: ../Pages/index.php');
            } else {
                header('Location: ../Pages/delente.php');
            }
            
        }
    }
?>