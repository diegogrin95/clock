<?php
require_once("soporte.php");
if ($auth->estaLogueado()) {
  header("Location:home.php");exit;
}

$nombreDefault = $_POST ? $_POST["nombre"] : "";
$apellidoDefault = $_POST ? $_POST["apellido"] : "";
$emailDefault = $_POST ? $_POST["email"] : "";

if ($_POST) {
  // Validar
  $arrayDeErrores = $validator->validarRegistracion($db);

  //Si no hay errores
  if (count($arrayDeErrores) == 0) {
    //Registrar
    $usuario = new Usuario($_POST["nombre"], $_POST["apellido"], $_POST["email"], $_POST["contrasena"]);

    $db->guardarUsuario($usuario);

    //Subir la foto
    $nombreArchivo = $_FILES["avatar"]["name"];

    $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);

    $nombre =  "img-usuarios/" . $_POST["email"] . ".$extension";
    $archivo = $_FILES["avatar"]["tmp_name"];
    move_uploaded_file($archivo, $nombre);

    //Redirigir a la confirmacion
    header("Location:ingresa.php");exit;
  }
}
/*
require_once "/clasesvalidator.php";

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
}*/
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
    <title>Registrate ~ CLOCK</title>
  </head>
<body>
  <main>
    <?php require_once "header.php"; ?>
    <input type='hidden' name='submitted' id='submitted' value='1'/>

    <!-- Form -->
    <section class="bkg-register">
    <div class="register">
      <h2>Registrate</h2>

      <?php if(isset($arrayDeErrores)) : ?>
  			<ul class="errores" style="color:#DC143C;">
  				<?php foreach($arrayDeErrores as $error) : ?>
  					<li>
  						<?=$error?>
  					</li>
  				<?php endforeach;?>
  			</ul>
  		<?php endif; ?>

        <form action="registrate.php" method="POST" enctype="multipart/form-data" onsubmit="return Validate()" name="vform">
        <div>
          <label>Nombre</label>
          <input type="text" name="nombre" required placeholder="Ingresa tu nombre" style="text-transform: capitalize" value="<?=$nombreDefault?>">
          <div id="nombre_error" class="val_error"> </div>
        </div>

        <div>
          <label>Apellido</label>
          <input type="text" name="apellido" required placeholder="Ingresa tu apellido" style="text-transform: capitalize" value="<?=$apellidoDefault?>">
          <div id="apellido_error" class="val_error"> </div>
        </div>

        <div>
          <label>E-mail</label>
          <input type="email" name="email" required placeholder="Ingresa tu mail" value="<?=$emailDefault?>">
          <div id="email_error" class="val_error"> </div>
        </div>

        <div>
          <label>Crea una contraseña</label>
          <input type="password" name="contrasena" required placeholder="Ingresa entre 6 y 10 caracteres">
          <div id="contrasena_error" class="val_error"> </div>
        </div>

        <label for='username'>Avatar:</label><br/>
        <input type='file' name='avatar'><br><br>
        <button type="submit">Registrarme</button>

      </form>
    </div>
  </section>
  </main>
  <?php include "footer.php"; ?>
</body>

<script type="text/javascript">
// juntando datos ingresados
  var nombre = document.forms["vform"]["nombre"];
  var apellido = document.forms["vform"]["apellido"];
  var email = document.forms["vform"]["email"];
  var contrasena = document.forms["vform"]["contrasena"];

  // error displays
  var nombre_error = document.getElemenyBtId("nombre_error");
  var apellido_error = document.getElemenyBtId("apellido_error");
  var email_error = document.getElemenyBtId("email_error");
  var contrasena_error = document.getElemenyBtId("contrasena_error");

  // event listeners
  nombre.addEventListener("blur", nombreVerify, true);
  apellido.addEventListener("blur", apellidoVerify, true);
  email.addEventListener("blur", emailVerify, true);
  contrasena.addEventListener("blur", contrasenaVerify, true);

  // validacion function
  function Validate(){
    // validacion nombre
    if (nombre.value == "") {
      nombre.style.border = "1px solid red";
      nombre_error.textContent = "Completa un nombre";
      nombre.focus();
      return false;
    }
    // validacion apellido
    if (apellido.value == "") {
      apellido.style.border = "1px solid red";
      apellido_error.textContent = "Completa un apellido";
      apellido.focus();
      return false;
    }
    // validacion email
    if (email.value == "") {
      email.style.border = "1px solid red";
      email_error.textContent = "Completa un mail valido";
      email.focus();
      return false;
    }
    // validacion contrasena
    if (contrasena.value == "") {
      contrasena.style.border = "1px solid red";
      contrasena_error.textContent = "Falta tu contraseña";
      contrasena.focus();
      return false;
    }
  }
  // event handler functions
  function nombreVerify(){
    if (nombre.value !="") {
      nombre.style.border = "1px solid blue";
      nombre_error.innerHTML = "";
      retun true;
    }
  }
  function apellidoVerify(){
    if (apellido.value !="") {
      apellido.style.border = "1px solid blue";
      apellido_error.innerHTML = "";
      retun true;
    }
  }
  function emailVerify(){
    if (email.value !="") {
      email.style.border = "1px solid blue";
      email_error.innerHTML = "";
      retun true;
    }
  }
  function contrasenaVerify(){
    if (contrasena.value !="") {
      contrasena.style.border = "1px solid blue";
      contrasena_error.innerHTML = "";
      retun true;
    }
  }
</script>

</html>
