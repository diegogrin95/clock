<?php
  function validarDatos($datosUsuario) {
      $errores = [];
      if (strlen($datosUsuario['nombre']) < 2) {
        $errores['nombre'] = "Ingresá un nombre mayor a 1 letra.";
      }
      if (!ctype_alpha($datosUsuario['nombre'])) {
        $errores['nombre'] = "Ingresá solo letras.";
      }
      if (strlen($datosUsuario['apellido']) < 2) {
        $errores['apellido'] = "Ingresá un apellido mayor a 1 letra.";
      }
      if (!ctype_alpha($datosUsuario['apellido'])) {
        $errores['apellido'] = "Ingresá solo letras.";
      }
      if (!filter_var($datosUsuario['email'], FILTER_VALIDATE_EMAIL)){
        $errores['email'] = "Completá el mail.";
      }
      /*if (email_exists($datosUsuario['email']) === true) {
        $errores['email'] = "El mail \''. $datosUsuario['email'] . '\' ya se encuentra registrado.";
      }*/
      if (empty($datosUsuario['contrasena'])){
        $errores['contrasena'] = "Ingresá contraseña!";
      } elseif (strlen($datosUsuario['contrasena']) < 6){
        $errores['contrasena'] = "La contraseña debe ser mayor a 6 caracteres.";
      } /*if (strlen($datosUsuario['contrasena'] > 10)){
          $errores['contrasena'] = "Ojo! Te pasaste. Hasta 10 caracteres.";
      }*/
      return $errores;
    }
    function guardarUsuario($datosUsuario){
      $nuevoUsuario = [
        "nombre" => $datosUsuario['nombre'],
        "apellido" => $datosUsuario['apellido'],
        "email" => $datosUsuario['email'],
        "contrasena" => sha1($datosUsuario['contrasena'])
      ];
      return $nuevoUsuario;
    }

    function guardarUsuarioJson ($nuevoUsuario){
      $jsonUser = json_encode($nuevoUsuario);
      file_put_contents('usuarios.json', $jsonUser . PHP_EOL, FILE_APPEND);
    }

function subirFoto($nuevoUsuario){
 $errores = [];

    if ($_FILES["avatar"]["error"] == UPLOAD_ERR_OK){
        $nombre=$_FILES["avatar"]["name"];
        $archivo=$_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($nombre, PATHINFO_EXTENSION);

   if ($ext != "jpg" && $ext != "png" && $ext != "jpeg"){
     $errores["avatar"] = "Ingresá solo formatos jpg, png y jpeg";
      return $errores;
    }
        $miArchivo = dirname(__FILE__);
        $miArchivo = $miArchivo . "/img-usuarios/";
        $miArchivo = $miArchivo. md5($_FILES["avatar"]["name"]) . "." . $ext;

        move_uploaded_file($archivo, $miArchivo);
    } else {
    $errores["avatar"] = "Error al cargar la imagen";
  }
 return $errores;
}
function validarDatosLogin($datosUsuarioLogin) {
    $erroresLogin = [];
    if (!filter_var($datosUsuarioLogin['email'], FILTER_VALIDATE_EMAIL)){
      $erroresLogin['email'] = "Completá el mail.";
    }
    if (empty($datosUsuarioLogin['contrasena'])){
      $erroresLogin['contrasena'] = "Ingresá contraseña!";
    } elseif (strlen($datosUsuarioLogin['contrasena']) < 6){
      $erroresLogin['contrasena'] = "La contraseña debe ser mayor a 6 caracteres.";
    }
    return $erroresLogin;
  }
  function buscarUsuarioEnElFile($email, $contrasena) {
    return array('nombre' =>  "$nuevoUsuario");
  }
/*
        $jsonUser = json_encode([
          "nombre" => $nombre,
          "apellido" => $apellido,
          "mail" => $mail,
          "contrasena" => $contrasena,
        ]);
        $fp = fopen("nosotros.json", "a+");
        echo ($fp);
          $resultado = fwrite($fp, $jsonUser . PHP_EOL);
          return $resultado;
        }
  }

  function escribirArchivoDeUsuario($jsonUser){
    $fp = fopen("usuarios.json", "a+");
    $resultado = fwrite($fp, $jsonUser . PHP_EOL);
    return $resultado;
*/
 ?>
