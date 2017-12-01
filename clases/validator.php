<?php

require_once("DB.php");

class Validator {
  public function validarLogin(DB $db) {
		$arrayDeErrores = [];


		if ($_POST["email"] == "") {
			$arrayDeErrores["email"] = "Completa un mail valido";
		}
		else if(filter_var($_POST["email"],  FILTER_VALIDATE_EMAIL) == false) {
			$arrayDeErrores["email"] = "El formato del mail esta mal";
		}
		else if ($db->traerPorEmail($_POST["email"]) == null) {
			$arrayDeErrores["email"] = "Tu mail no esta se encuentra registrado";
		}
		else {
			//El mail existe!!
			$usuario = $db->traerPorEmail($_POST["email"]);

			if (password_verify($_POST["contrasena"], $usuario->getContrasena()) == false) {
				$arrayDeErrores["contrasena"] = "La contraseña no coincide con el mail registrado";
			}
		}

		return $arrayDeErrores;
	}

  public function validarRegistracion(DB $db) {
		$arrayDeErrores = [];

		$nombreArchivo = $_FILES["avatar"]["name"];

		$extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);

		if ($_FILES["avatar"]["error"] != UPLOAD_ERR_OK) {
			$arrayDeErrores["avatar"] = "Ey, no se subio bien la foto";
		}
		else if ($extension != "jpg" && $extension != "jpeg" && $extension != "gif" && $extension != "png") {
			$arrayDeErrores["avatar"] = "La foto no tiene un formato valido";
		}

		if ($_POST["nombre"] == "") {
			$arrayDeErrores["nombre"] = "El nombre esta mal";
		}

    if ($_POST["apellido"] == "") {
			$arrayDeErrores["apellido"] = "El apellido esta mal";
		}

		if ($_POST["email"] == "") {
			$arrayDeErrores["email"] = "El mail no esta";
		}
		else if(filter_var($_POST["email"],  FILTER_VALIDATE_EMAIL) == false) {
			$arrayDeErrores["email"] = "El formato de mail esta mal";
		}

		if (strlen($_POST["contrasena"]) < 6) {
			$arrayDeErrores["contrasena"] = "Ingresa al menos 6 caracteres";
		}

		return $arrayDeErrores;
	}
}

?>
