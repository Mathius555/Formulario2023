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




if (isset($_GET['id_usuario'])){
    
    $id_usuario = $_GET['id_usuario'];
    
    $query = "DELETE  FROM usuario WHERE id_usuario = $id_usuario";
    $result = mysqli_query($conn, $query);
    if(!$result)
    {
        die("El query para eliminar falló");
    }
    else{
        ?>
        <script>alert("Registro Eliminado");</script>
        <?php 
    }
}



    //
    ?>
    <script>
    
    window.location = "mostrar_datos.php";
   
    </script>

