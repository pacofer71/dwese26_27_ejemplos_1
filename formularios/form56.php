<?php
    $nombre="";
    $email="";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        //procesamos los campos
        //1.- Recogemos los datos
        $nombre=$_POST['nombre'];
        $email=$_POST['correo'];
        echo "El nombre es: $nombre y el email es $email";
        echo "<br>";
        echo "<a href='{$_SERVER['PHP_SELF']}'>Regresar</a>";
    }else{
        //Pinto el formulario
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <label>NOMBRE: </label>
        <input type="text" name="nombre" value="<?= $nombre ?>" placeholder="Tu nombre..." />
        <br>
        <label>EMAIL: </label>
        <input type='email' name='correo' value="<?= $email ?>" placeholder="Tu email..." />
        <br>
        <input type='submit' />&nbsp;&nbsp;&nbsp;&nbsp;
        <input type='reset' />
    </form>
</body>
</html>
<?php } ?>