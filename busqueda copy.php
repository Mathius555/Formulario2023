
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



    <div class ="card text-center">
        <div class="card-body">
            <h1 class="card-title">Mostrar datos</h1>

       
<form action="busqueda.php" method="GET">
  <input type="text" name="busqueda" placeholder="Buscar">
  <input type="submit" value="Buscar">
</form>



            <div class="card-body ">
                 <a href="formulario.php" class="btn btn-secondary" >Volver</a>
              <div>




         
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                        <th>ID </th>
                            <th>Nombre </th>
                            <th>Apellido</th>
                            <th>DNI</th>
							 <th>Email</th>
                            <th>Telefono</th>
                            
                        </tr>
                    </thead>
                    <tbody>

<?php
(include "db.php");

$busqueda = $_GET['busqueda'];


$mysql_host = "localhost"; 
$mysql_user = "root"; 
$mysql_pass = ""; 
$mysql_dbname = "formulario23"; 

$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_dbname);

if (!$conn) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
$query = "SELECT * FROM usuario  ORDER BY nombre desc;";
						$query = "SELECT 
                                        id_usuario,
										 nombre,
						              apellido,
                                        DNI,
										email,
                                        telefono,
									DNI
						          FROM usuario
								  
								  ORDER BY nombre desc;";

                        $resultado = mysqli_query($conn, $query);
$sql = "SELECT * FROM usuario WHERE nombre LIKE '%$busqueda%'";

$resultado = $conn->query($sql);

while($row = mysqli_fetch_array($resultado)){
if ($resultado->num_rows > 0) {
    
    $row_html =  "<tr>
        <td>". $row['id_usuario']."</td>
           <td>". $row['nombre']."</td>
            <td>". $row['apellido']."</td>
            <td>". $row['DNI']."</td>
            <td>". $row['email']."</td>
            <td>". $row['telefono']."</td>
            <td> <a href='editar_datos.php?id_usuario='". $row['id_usuario'] ." class='btn btn-warning'>Editar</a> </td>
            <td> <a href='eliminar_datos.php?id_usuario='". $row['id_usuario'] ." class='btn btn-danger'>Eliminar</a></td>
        </tr>";
        echo $row_html;
}else {
    echo 
    "No se encontraron resultados.";
    } }?>

    </tbody>
    </table>
</div>
</div>
</div> 

<?php$conn->close();?>

