<?php
require_once('../Modelo/Administradores.php');

if ($_POST) {
    $Modeloadministradores = new Administradores();

    $Id = $_POST['Id'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Usuario = $_POST['Usuario'];
    $Password = $_POST['Password'];
    $Estado = $_POST['Estado'];

    $Modeloadministradores->update($Id,$Nombre,$Apellido,$Usuario,$Password,$Estado);
}else {
    header('Location: ../../index.php');
}

?>