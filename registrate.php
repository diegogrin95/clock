<?php

require_once "validaciones.php";

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : "";
$errores = [];
if ($_POST){
  $errores = validarDatos($_POST);
  if (count($errores) == 0) {
    $nuevoUsuario = guardarUsuario($_POST);
    $erroresdeImagen = subirFoto($_POST);
    $errores = array_merge($errores, $erroresdeImagen);
      if (count($errores) == 0) {
      guardarUsuarioJson($nuevoUsuario);
      header('location:home.php');
    }
  }
}
/*
if (empty($errores)) {
  guardarUsuario($_POST);
  } else {
  var_dump ($errores);
}*/
// Inicializar mi usuario
/* $fueCompletado = isset($_REQUEST['submitted']);

if ($fueCompletado) {
    $resultado = guardarUsuario($_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['mail'], $_REQUEST['contraseña'], $_FILES['avatar']);

    if (is_array($resultado) && ! empty($resultado)) {
        echo "Hubo errores";
      }
    else {
        echo "Se guardo bien";
      }
 }*/
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css"
          href="https://fonts.googleapis.com/css?family=Lato">
    <title>Registrate</title>
  </head>
<body>
  <main>
    <?php require_once "header.php"; ?>
    <input type='hidden' name='submitted' id='submitted' value='1'/>

    <!-- Form -->
    <section class="bkg-register">
    <div class="register">
      <h2>Registrate</h2>
      <form action="registrate.php" method="post" enctype="multipart/form-data">
        <?php if (count($errores) > 0) : ?>
              <ul style="color:#DC143C;">
                <?php foreach($errores as $error) : ?>
                  <li>
                    <?=$error?>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
        <label>Nombre</label>
        <input type="text" name="nombre" required placeholder="Ingresa tu nombre" value=<?=$nombre?>>
        <label>Apellido</label>
        <input type="text" name="apellido" required placeholder="Ingresa tu apellido" value=<?=$apellido?>>
        <label>E-mail</label>
        <input type="email" name="email" required placeholder="Ingresa tu mail" value=<?=$email?>>
        <label>Crea una contraseña</label>
        <input type="password" name="contrasena" required placeholder="Ingresa entre 6 y 10 caracteres">
        <label for='username'>Avatar:</label><br/>
        <input type='file' name='avatar'><br>
        <button type="submit">Registrarme</button>
      </form>
    </div>
  </section>
  </main>
</body>
</html>
