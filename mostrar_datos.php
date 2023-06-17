
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
require 'vendor/autoload.php';


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
?>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand">Formulario</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link" href="formulario.php">Inicio</a>
      </li>
      <li class="nav-item">
    </ul>                 
  </div>
</nav>




    <div class ="card text-center">
        <div class="card-body">
            <h1 class="card-title">Mostrar todos los datos</h1>

       
<form action="busqueda.php" method="GET">
  <input type="text" name="busqueda" placeholder="Buscar">
  <input type="submit" value="Buscar">
</form>



           


         
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
                        $result_usuario = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_usuario)){?>
                            <tr>
                            <td><?php echo $row['id_usuario']?></td>
                               <td><?php echo $row['nombre']?></td>
                                <td><?php echo $row['apellido']?></td>
                                <td><?php echo $row['DNI']?></td>
								<td><?php echo $row['email']?></td>
                                <td><?php echo $row['telefono']?></td>
                                <td> <a href="editar_datos.php?id_usuario=<?php echo $row['id_usuario'] ?>" class="btn btn-warning">Editar</a> </td>
                                <td> <a href="eliminar_datos.php?id_usuario=<?php echo $row['id_usuario'] ?>" class="btn btn-danger">Eliminar</a></td>
                            </tr>
                            
                        <?php } ?>
                        


                    </tbody>


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




                </table>
                
            </div>
        </div>
    </div> 

