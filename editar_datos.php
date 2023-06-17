<?php
include("db.php");

if (isset($_GET['id_usuario'])) {
    $codigo = $_GET['id_usuario'];
    $query = "SELECT * FROM usuario WHERE id_usuario = $codigo";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];
        $DNI = $row['DNI'];
        $telefono = $row['telefono'];
        $email = $row['email'];
    }
}

if (isset($_POST['update2'])) {
    $codigo = $_GET['id_usuario'];
    $nombre = $_POST['nombre']; 
    $apellido = $_POST['apellido']; 
    $DNI = $_POST['DNI']; 
    $telefono = $_POST['telefono']; 
    $email = $_POST['email']; 

    $query = "UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', DNI = '$DNI', email= '$email', telefono = '$telefono' WHERE id_usuario = $codigo";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "El query de actualizar falló";
    } else {
        ?>
        <script>alert("Registro actualizado");</script>
        <script>
            window.location = "mostrar_datos.php";
        </script>
        <?php
    }
}
?>

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
<body>





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






    <div class="card text-center">
        <div class="card-body">
            <h1 class="card-title">Formulario</h1>
            <p class="card-text">Edite o actualice cualquier dato</p>

            <form action="editar_datos.php?id_usuario=<?php echo $codigo ?>" method="POST">
                <div class="form-group">
                    <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre" autofocus value="<?php echo $nombre ?>">
                </div>
                <div class="form-group">
                    <input type="text" name="apellido" class="form-control" placeholder="Ingrese apellido" value="<?php echo $apellido ?>">
                </div>
                <div class="form-group">
                    <input type="text" name="DNI" class="form-control" placeholder="Ingrese DNI" value="<?php echo $DNI ?>">
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Ingrese email" value="<?php echo $email ?>">
                </div>
                <div class="form-group">
                    <input type="text" name="telefono" class="form-control" placeholder="Ingrese telefono" autofocus value="<?php echo $telefono?>">
                </div>
                <input type="submit" class="btn btn-success" name="update2" value="Actualizar">
            </form>
        </div>
    </div>
</body>
</html>
