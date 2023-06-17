<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Nombre');
$sheet->setCellValue('B1', 'Apellido');
$sheet->setCellValue('C1', 'DNI');
$sheet->setCellValue('D1', 'Email');
$sheet->setCellValue('E1', 'Teléfono');

$mysql_host = "localhost";
$mysql_user = "root";
$mysql_pass = "";
$mysql_dbname = "formulario23";

$conn = new PDO("mysql:host=$mysql_host;dbname=$mysql_dbname;charset=utf8", $mysql_user, $mysql_pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT  nombre, apellido, DNI, email, telefono FROM usuario ORDER BY nombre DESC";
$result_usuario = $conn->query($query);

$rowNumber = 2; 


while ($row = $result_usuario->fetch(PDO::FETCH_ASSOC)) {
    $sheet->setCellValue('A' . $rowNumber, $row['nombre']);
    $sheet->setCellValue('B' . $rowNumber, $row['apellido']);
    $sheet->setCellValue('C' . $rowNumber, $row['DNI']);
    $sheet->setCellValue('D' . $rowNumber, $row['email']);
    $sheet->setCellValue('E' . $rowNumber, $row['telefono']);

    $rowNumber++;
}


$writer = new Xlsx($spreadsheet);


$filename = 'registros_de_datos.xlsx';


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');


$writer->save('php://output');
exit();
?>
