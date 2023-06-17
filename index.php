
<?php 
require_once "module/usuario.php";
//Este codigo es la API//


switch($_SERVER ['REQUEST_METHOD']){
case 'GET':
    if(isset($_GET['id_usuario' ])){
        echo json_encode(usuario::getWhere($_GET['id_usuario' ]));
    }else{
        echo json_encode(usuario::getAll());
    }
    break;
    case 'POST':
        $datos = json_decode(file_get_contents('php://input'));
        if($datos != NULL) {
            if(usuario::insert($datos->nombre, $datos->apellido, $datos->DNI, $datos->email, $datos->telefono)) {
                http_response_code(200);
            }
            else {
                http_response_code(400);
            }
        }
        else {
            http_response_code(405);
        }
        break;
    
    case 'PUT':
        $datos = json_decode(file_get_contents('php://input'));
        if($datos != NULL) {
            if(usuario::update($datos->id_usuario, $datos->nombre, $datos->apellido, $datos->DNI, $datos->email, $datos->telefono)) {
                http_response_code(200);
            }
            else {
                http_response_code(400);
            }
        }
        else {
            http_response_code(405);
        }
        break;

    case 'DELETE':
        if(isset($_GET['id_usuario'])){
            if(usuario::delete($_GET['id_usuario'])) {
                http_response_code(200);
            }
            else {
                http_response_code(400);
            }
        }
        else {
            http_response_code(405);
        }
        break;
    
    default:
        http_response_code(405);
        break;
}