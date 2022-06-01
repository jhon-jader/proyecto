<?php

require_once('../../Usuarios/Modelo/Usuarios.php');
require_once('../Modelo/Materias.php');

$ModeloUsuarios = new Usuarios;
$ModeloUsuarios->validateSession();

$Modelo = new Materias();

$Id = $_GET['Id'];
$InformacionMateria = $Modelo->getById($Id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Notas</title>
</head>
<body>
    <h1>Editar Materia </h1>
    <form action="../Controladores/edit.php" method= "POST">
    <input type="hidden" name="Id" value="<?php echo $Id ?>"> 
        <?php
        if ($InformacionMateria != null) {
            foreach ($InformacionMateria as $Info) {
                
        ?>
        Nombre <br>
        <input type="text" name="Nombre" required="" autocomplete="off" placeholder="Nombre Materia" 
        value="<?php echo $Info['MATERIA']?>"><br><br>
        <?php
            }
        }
        ?>

        <input type="submit" value="Editar Materia">
    </form>
</body>
</html>