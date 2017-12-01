<?php

require_once("usuario.php");

abstract class DB {
  public abstract function traerTodosLosUsuarios();
  public abstract function traerPorEmail($email);
  public abstract function guardarUsuario(Usuario $usuario);
}

?>
