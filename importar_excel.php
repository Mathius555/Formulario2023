<?php
require 'vendor/autoload.php';
function debug($data, $die= true){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    $die AND die;
}
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$mysql_host = "localhost";
$mysql_user = "root";
$mysql_pass = "";
$mysql_dbname = "formulario23";

$conn = new PDO("mysql:host=$mysql_host;dbname=$mysql_dbname;charset=utf8", $mysql_user, $mysql_pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_FILES['file'])) {
    $file = $_FILES['file']['tmp_name'];

    $spreadsheet = IOFactory::load($file);
    $worksheet = $spreadsheet->getActiveSheet();
    $i = 0;
    foreach ($worksheet->getRowIterator() as $row) {
        $rowData = [];
        foreach ($row->getCellIterator() as $cell) {
           //debug($cell);
           if($i != 0)
           $rowData[] = $cell->getValue();
        }
        $i ++;
        if (count($rowData) != 0){
            $nombre = $rowData[0] ?? '';
            $apellido = $rowData[1] ?? '';
            $DNI = $rowData[2] ?? '';
            $email = $rowData[3] ?? '';
            $telefono = $rowData[4] ?? '';
    
            
            $query = "SELECT DNI FROM usuario WHERE DNI = :DNI";
            $uload = $conn->prepare($query);
            $uload->bindParam(':DNI', $DNI);
            $uload->execute();
            $existing = $uload->fetch();
            
            if ($existing) {
                
                $query = "UPDATE usuario SET nombre = :nombre, apellido = :apellido,
                          DNI = :DNI, email = :email, telefono = :telefono WHERE DNI = :DNI";
                $uload = $conn->prepare($query);
                $uload->bindParam(':nombre', $nombre);
                $uload->bindParam(':apellido', $apellido);
                $uload->bindParam(':DNI', $DNI);
                $uload->bindParam(':email', $email);
                $uload->bindParam(':telefono', $telefono);
                $uload->execute();
            } else {
                
             
             //   debug($rowData);
    
                $query = "INSERT INTO usuario (nombre, apellido, DNI, email, telefono)
                          VALUES (:nombre, :apellido, :DNI, :email, :telefono)";
                $uload = $conn->prepare($query);
                $uload-> bindParam(':nombre', $nombre);
                $uload->bindParam(':apellido', $apellido);
                $uload->bindParam(':DNI', $DNI);
                $uload->bindParam(':email', $email);
                $uload->bindParam(':telefono', $telefono);
                $uload->execute();
                  }
        }
        
        
    }


 
    
    header('Location: mostrar_datos.php');
    exit();
}
?>
