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
        $query = 'INSERT INTO usuarios (username, password, perfil) VALUES (:username, :password, :perfil)';
        $stmt = $this->conexion->prepare($query);        //statement o sentencia
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