<?php

include "validaciones.php";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : "";
$erroresLogin = [];

if ($_POST["submitted"] == 1) {
    $erroresLogin = validarDatosLogin(array("email" => $email, "contrasena" => $contrasena));
    if (empty($erroresLogin)) {
      $usuario = buscarUsuarioEnElFile($email, $contrasena);

      if ($usuario != false) {
        // lo encontre!!
        // iniciar la session y setear el valor remember_me, tambien podrian setear el nobre de pila del usuario
        session_start();
        $_SESSION["logged"] = true;
        $_SESSION["nombre"]= $usuario["nombre"];
        header('Location: home.php');
      } else {
        header("Location: home.php?home=login");
        exit();
        // No lo encontre! le mueustro un mensaje diciendole que su user no existe, le sugiero registrarse
      }
    }
}
/*
session_start();
$_SESSION['login_user']= $logged_in;
echo $_SESSION['login_user'];

    /*if($_POST['recordarme']) {
    session_start();/*
    ('remember_me', $_POST['usuario'], $year);
  }
    elseif(!$_POST['recordarme']) {
    if(isset($_COOKIE['remember_me'])) {
      $past = time() - 100;
      setcookie(remember_me, gone, $past);
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
    <title>¡Hola! Ingresa tu usuario y contraseña</title>
  </head>
<body>
  <main>
    <?php include "header.php"; ?>
    <!-- Foto -->
    <div class="foto-banner">Imagen principal</div>
    <!-- Form -->
    <div class="form">
      <h2>¡Hola! Ingresá tu usuario y contraseña</h2>
        <form action="ingresa.php" method="POST" enctype="multipart/form-data">
          <input type='hidden' name='submitted' id='submitted' value='1'/>
          <?php if (count($erroresLogin) > 0) : ?>
                <ul style="color:#DC143C;">
                  <?php foreach($erroresLogin as $error) : ?>
                    <li>
                      <?=$error?>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
        <label>Nombre de usuario</label><br>
        <input type="text" name="email" required="email" placeholder="Ingresa tu mail"
        value=<?=$email?>>
        <label>Contraseña</label> <a href="#">Olvidé mi contraseña</a><br>
        <input type="password" name="contrasena" required="contrasena" placeholder="Ingresa tu contraseña"><br>
        <label>Recordarme</label>
        <input type="checkbox" name="recordarme" value="1"><br>
        <button type="submit">Ingresar</button>

      </form>
    </div>
  </main>
</body>
</html>
