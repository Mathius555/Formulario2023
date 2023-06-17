<?php include("db.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>





<?php 
$mysql_host = "localhost"; 
$mysql_user = "root"; 
$mysql_pass = ""; 
$mysql_dbname = "formulario23"; 



 $conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_dbname);
 if (!$conn) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

if (isset($_POST['guardar_registro'])){


    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $DNI = $_POST['DNI'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

}


    $query = "INSERT INTO usuario(nombre, apellido, DNI, telefono, email)  VALUES ('$nombre','$apellido','$DNI','$telefono', '$email')";
    $result = mysqli_query($conn, $query);

if (!$result) {
    die("Error al guardar los datos en la base de datos: " . mysqli_error($conn));
} else {
    ?>
    <script>alert("Registro actualizado");</script>
    <script>
        window.location = "formulario.php";
    </script>
    <?php
    
}
mysqli_close($conn);

  

