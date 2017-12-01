<?php

class Usuario {
  private $nombre;
  private $apellido;
  private $email;
  private $contrasena;
  private $id;

  public function __construct($nombre, $apellido, $email, $contrasena, $id = null) {
    if ($id == null) {
      // Viene por POST
      $this->contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
    } else {
      // Viene de la base
      $this->contrasena = $contrasena;
    }

    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->email = $email;
    $this->id = $id;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  public function getApellido() {
    return $this->apellido;
  }

  public function setApellido($apellido) {
    $this->apellido = $apellido;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getContrasena() {
    return $this->contrasena;
  }

  public function setContrasena($contrasena) {
    $this->contrasena = $contrasena;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function toArray() {
    return [
      "id" => $this->id,
      "nombre" => $this->nombre,
      "apellido" => $this->apellido,
      "email" => $this->email,
      "contrasena" => $this->contrasena
    ];
  }
}
?>
