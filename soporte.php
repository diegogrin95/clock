<?php

require_once("clases/auth.php");
require_once("clases/validator.php");
require_once("clases/DBJSON.php");
require_once("clases/DBMySQL.php");

$auth = new Auth();
$validator = new Validator();
$db = new DBMySQL();
