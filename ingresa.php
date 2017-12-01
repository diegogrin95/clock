<?php
	require_once("soporte.php");

	if ($auth->estaLogueado()) {
		header("Location:home.php");exit;
	}
	if ($_POST) {
		$arrayDeErrores = $validator->validarLogin($db);
		if (count($arrayDeErrores) == 0) {
			$auth->loguear($_POST["email"]);
			if (isset($_POST["recordame"])) {
				setcookie("usuarioLogueado", $_POST["email"], time()+60*60*24*30);
			}
			header("Location:home.php");
		}
	}
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css"
          href="https://fonts.googleapis.com/css?family=Lato">
    <title>Ingresa ~ CLOCK</title>
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
          <?php if (isset($arrayDeErrores)) : ?>
                <ul style="color:#DC143C;">
                  <?php foreach($arrayDeErrores as $error) : ?>
                    <li>
                      <?=$error?>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
        <label>Nombre de usuario</label><br>
        <input type="text" name="email" required="email" placeholder="Ingresa tu mail">
        <label>Contraseña</label> <a href="#">Olvidé mi contraseña</a><br>
        <input type="password" name="contrasena" required="contrasena" placeholder="Ingresa tu contraseña"><br>
        <label>Recordarme</label>
        <input type="checkbox" name="recordame" value="1"><br>
        <button type="submit">Ingresar</button>
      </form>
    </div>
  </main>
  <?php include "footer.php"; ?>
</body>
</html>
