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


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand">Formulario</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link" href="formulario.php">Inicio </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mostrar_datos.php">Mostrar todos los datos</a>
      </li>
    </ul>                 
  </div>
</nav>




    <div class ="card text-center">
        <div class="card-body">
            <h1 class="card-title">Busqueda de datos</h1>

       
<form action="busqueda.php" method="GET">
  <input type="text" name="busqueda" placeholder="Buscar">
  <input type="submit" value="Buscar">
</form>




<div class="outer-container">
    <form action="importar_excel.php" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
        <div>
            <label>Elija un archivo Excel:</label>
            <input type="file" name="file" id="file" accept=".xls,.xlsx">
            <button type="submit" class="btn btn-primary">Importar datos </button>
            <a href="exportar_excel.php" class="btn btn-success">Exportar datos</a>
        </div>
    </form>
</div>
      




         
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


$sql = "SELECT * FROM usuario WHERE id_usuario LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%' OR apellido LIKE '%$busqueda%' OR DNI LIKE '%$busqueda%' OR email LIKE '%$busqueda%' OR telefono LIKE '%$busqueda%' ";
$resultado = $conn->query($sql);

while($row = mysqli_fetch_array($resultado)){
    if ($resultado->num_rows > 0) {
    ?>
       <tr>
        <td><?php echo $row['id_usuario'];?></td>
           <td><?php echo $row['nombre'];?></td>
            <td><?php echo $row['apellido'];?></td>
            <td><?php echo $row['DNI'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['telefono'];?></td>
            <td> <a href="editar_datos.php?id_usuario=<?php echo $row['id_usuario']; ?>" class="btn btn-warning">Editar</a> </td>
            <td> <a href="eliminar_datos.php?id_usuario=<?php echo $row['id_usuario'] ;?>" class="btn btn-danger">Eliminar</a></td>
        </tr>
        
    <?php
    
    }else {
        "No se encontraron resultados.";
    }};




    
    ?>









