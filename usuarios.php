<?php

  function guardarUsuario($nombre, $apellido, $email, $contraseña){

    $errores = validarDatos(array(
      private "nombre" => $nombre,
      private "apellido" => $apellido,
      private "email" => $email,
      private "contraseña" => $contraseña,
    ));

    var_dump($errores);

    if (empty($errores)) {
      $contraseña = sha1($contraseña);

      $jsonUser = json_encode([
        "nombre" => $nombre,
        "apellido" => $apellido,
        "email" => $email,
        "contraseña" => $contraseña,
      ]);
      $fp = fopen("nosotros.json", "a+");
      echo ($fp);
        $resultado = fwrite($fp, $jsonUser . PHP_EOL);
        return $resultado;
      }
}
        function escribirArchivoDeUsuario($jsonUser){
          $fp = fopen("nosotros.json", "a+");
          $resultado = fwrite($fp, $jsonUser . PHP_EOL);
          return $resultado;
}
      /*function email_exists($email){
        $email = sanitize($email);
      }*/
 ?>
