<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';


//todo lo relacionado de la base de datos dbe estar en el modelo
//un modelo por lo regular apunta a una tabla o una vista

class modelousuario
{
    private $conexion;

    //al instanciar la clase debo obtener la conexion
    public function __construct()
    {

        $this->conexion = Conexion::obtenerConexion();
    }

    //debe aver un metodo para hacer select
    public function obtenerUsuarios()
    {
        $query = $this->conexion->query('select id, username,password,perfil from usuarios');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    //debe aver un metodo para hacer insert
    public function insertarUsuario($username, $password, $perfil)
    {
        $query = 'INSERT INTO usuarios (username, password, perfil) VALUES (:username, :password, :perfil)';
        $stmt = $this->conexion->prepare($query);        //statement o sentencia
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':perfil', $perfil);
        return $stmt->execute();
    }
    //debe aver un metodo para hacer delete
    public function eliminarusuariopornombre($username)
    {
        $query = "delete from usuarios where username = :username";
        $stmt = $this->conexion->prepare($query);        //statement o sentencia
        $stmt->bindParam(':username', $username);
        return $stmt->execute();
    }

    //debe aver un metodo para hacer update
    public function actualizarusuarios($id, $username, $password, $perfil)
    {
        $query = "update usuarios set username= :username, password= :password, perfil= :perfil where id = :id";
        $stmt = $this->conexion->prepare($query);        //statement o sentencia
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':perfil', $perfil);
        return $stmt->execute();
    }

    //obtener un solo usuario por su nombre
    public function obtenerusuariopornombre($username)
    {
        $query = "select id, username, password, perfil from usuarios where username = :username";
        $stmt = $this->conexion->prepare($query);        //statement o sentencia
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}

?>