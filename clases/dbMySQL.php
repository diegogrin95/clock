<?php

require_once("DB.php");

class DBMySQL extends DB {
  private $conn;


  public function __construct() {
    $dsn = "mysql:host=127.0.0.1;port=3306;dbname=clock";
    $user = "root";
    $pass = "root";
    $this->conn = new PDO($dsn, $user,$pass);
  }

  public function traerTodosLosUsuarios() {
    $sql = "Select * from usuarios";
    $query = $this->conn->prepare($sql);
    $query->execute();
    $arrayDeArrays = $query->fetchAll(PDO::FETCH_ASSOC);
    $arrayDeObjs = [];

    foreach ($arrayDeArrays as $array) {
      $arrayDeObjs[] = new Usuario($array["nombre"], $array["apellido"],$array["email"], $array["contrasena"], $array["id"]);
    }

    return $arrayDeObjs;
  }
  public function traerPorEmail($email) {
    $sql = "Select * from usuarios where email = :email";
    $query = $this->conn->prepare($sql);
    $query->bindValue(":email", $email);
    $query->execute();
    $array = $query->fetch(PDO::FETCH_ASSOC);

    if (!$array) {
      return NULL;
    }
    else {
      return new Usuario($array["nombre"], $array["apellido"], $array["email"],$array["contrasena"], $array["id"]);
    }

}

  public function guardarUsuario(Usuario $usuario) {
    $sql = "INSERT into usuarios values(default, :nombre, :apellido, :email, :contrasena)";

    $query = $this->conn->prepare($sql);
    $query->bindValue(":nombre",$usuario->getNombre());
    $query->bindValue(":apellido",$usuario->getApellido());
    $query->bindValue(":email",$usuario->getEmail());
    $query->bindValue(":contrasena",$usuario->getContrasena());

    $query->execute();

  }

  public function buscarUsuarios($buscar) {
    $sql = "Select * from usuarios where email like :buscar or nombre like :buscar";
    $query = $this->conn->prepare($sql);

    $query->bindValue(":buscar", "%" . $buscar . "%");

    $query->execute();

    $arrayDeArrays = $query->fetchAll(PDO::FETCH_ASSOC);

    $arrayDeObjs = [];

    foreach ($arrayDeArrays as $array) {
      $arrayDeObjs[] = new Usuario($array["nombre"], $array["apellido"],$array["email"], $array["contrasena"], $array["id"]);
    }

    return $arrayDeObjs;


  }
}


?>
