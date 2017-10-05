<?php

session_destroy ();
//session_unset();
//ob_start();
header('Location: home.php');
//ob_end_flush();
exit();
?>
