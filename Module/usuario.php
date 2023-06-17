
<?php
require_once "Connection/connection.php";

class usuario{
    public static function getAll(){
        $db = new Connection();
        $query = "SELECT *FROM usuario";
        $resultado = $db->query($query);
        $datos = [];
        if($resultado->num_rows) {
            while($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'id_usuario' => $row['id_usuario'],
                    'nombre' => $row['nombre'],
                    'apellido' => $row['apellido'],
                    'DNI' => $row['DNI'],
                    'email' => $row['email'],
                    'telefono' => $row['telefono']
                ];
            }
            return $datos;
        }
        return $datos;
    }

    public static function getWhere($id_usuario){
        $db = new Connection();
        $query = "SELECT *FROM usuario WHERE id_usuario = $id_usuario";
        $resultado = $db->query($query);
        $datos = [];
        if($resultado->num_rows) {
            while($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'id_usuario' => $row['id_usuario'],
                    'nombre' => $row['nombre'],
                    'apellido' => $row['apellido'],
                    'DNI' => $row['DNI'],
                    'email' => $row['email'],
                    'telefono' => $row['telefono']
                ];
            }
            return $datos;
        }
        return $datos;
    }



    public static function insert($nombre, $apellido, $DNI, $email, $telefono) {
        $db = new Connection();
        $query = "INSERT INTO usuario (nombre, apellido, DNI, email, telefono)
        VALUES('".$nombre."', '".$apellido."', '".$DNI."', '".$email."', '".$telefono."')";
        $db->query($query);
        if($db->affected_rows) {
            return TRUE;
        }
        return FALSE;
    }

    public static function update($id_usuario, $nombre,$apellido,$DNI,$email,$telefono){
        $db = new connection();
        $query = "UPDATE usuario SET nombre='".$nombre."', apellido='".$apellido."', DNI='".$DNI."', email='".$email."', telefono='".$telefono."'  WHERE id_usuario=$id_usuario";
         $db->query($query);
        if ($db->affected_rows){
            return TRUE;
        }
        return FALSE;
    }
    public static function delete($id_usuario){
        $db = new connection();
        $query = "DELETE FROM usuario WHERE id_usuario = $id_usuario";
        $db->query($query);
        if ($db->affected_rows){
            return TRUE;
        }
        return FALSE;
    }
 }

?>