<?php

require_once $_SERVER['DOCUMENT_ROOT']. '/models/connect/conexion.php';


class modelousuario{
    private $conexion;

    //al instanciar la clase debo obtener la conexion
    public function __construct(){

        $this->conexion = Conexion::obtenerConexion();
    }

    //debe aver un metodo para hacer select
    public function obtenerUsuarios(){
        $query = $this->conexion->query('select id, username,password,perfil from usuarios');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    //debe aver un metodo para hacer insert
    public function insertarUsuario($username, $password, $perfil){
        $query = $this->conexion->query('insert into usuarios(username,password,perfil) values(:username,:password,:perfil)');
        //statement o sentencia
        $stmt= $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':perfil', $perfil);
        return $stmt->execute();
    }
    //debe aver un metodo para hacer delete

    //debe aver un metodo para hacer update
}

?>