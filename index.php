<?php
session_start();

$token = bin2hex(random_bytes(32));
$_SESSION["token"] = $token;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Security-Policy"
        content="base-uri 'self'; form-action 'self'; connect-src 'self'; default-src 'self'; font-src 'self'; frame-src 'self'; img-src 'self'; manifest-src 'self'; media-src 'self'; object-src 'none'; script-src 'report-sample' 'self'; style-src 'report-sample' 'self'; worker-src 'none';">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Notas</title>
</head>
<body>
<h2>Identificar si se hacen los cambios</h2>
    <h1>Inicio de Sesión janajhs</h1>
    <form method="POST" action="Usuarios\Controladores\Login.php">
        Usuarios <br>
        <input type="hidden" name="token" value="<?php echo $token; ?>"/>
        <input type="text" name= "Usuario" required= "" autocomplete= "off" placeholder= "Usuario"> <br><br>
        Contraseña <br>
        <input type="password" name= "Contrasena" required= "" autocomplete= "off" placeholder= "Contraseña"><br><br>
        <input type="submit" value = "Iniciar Sesión">

    </form>
</body>
</html>