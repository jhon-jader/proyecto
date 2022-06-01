<?php
require_once('../../Usuarios/Modelo/Usuarios.php');

$ModeloUsuarios = new Usuarios;
$ModeloUsuarios->validateSession();

$Id = $_GET['Id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema De Notas</title>
</head>
<body>
    <h1>Eliminar Materia</h1>
    <form action="../Controladores/delete.php" method= "POST">
        <input type="hidden" name= "Id" value="<?php echo $Id ?>">
        <p>¿Estas seguro que de seas eliminar esta materia?</p>
        <input type="submit" value ="Eliminar Materia">
    </form>
</body>
</html>