<?php
  $dsn = 'mysql:host=localhost;dbname=clock;charset=utf8mb4;port:3306';
  $db_user = 'root';
  $db_pass = '1234';
  $db = new PDO ($dsn, $db_user, $db_pass);

  $db = null;

  var_dump;
