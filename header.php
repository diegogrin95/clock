<?php
session_start();
$_SESSION["logged_in"] = true;?>
<header>
  <!-- Barra de navegación -->
  <nav class="navigation">
    <ul class="navigation-menu">
      <li><a href="home.php" class="navigation-user-logo">
        <img src="icons/logo.png" alt="Logo"></a>
      </li>
    </ul>
    <ul class="navigation-user">

      <?php
      session_start();
      if($_SESSION["logged"]):;?>
        <?php/* $nickname= $_SESSION['nombre']; */?>
        <li><a class="navigation-user-link">Bienvenido,
          <?php /*
          $usuario = fopen ("usuarios.json", "r")*/ echo $usuario?></a></li>
        <li><a href="logout.php" class="navigation-user-link">Salir</a></li>
        <li><a href="ayuda.php" class="navigation-menu-link">Ayuda</a></li>
        <?php header ("Location:ayuda.php")?>
      <?php else: ?>
        <li><a href="ingresa.php" class="navigation-user-link">Ingresá</a></li>
        <li><a href="registrate.php" class="navigation-menu-link">Registrate</a></li>
        <li><a href="ayuda.php" class="navigation-menu-link">Ayuda</a></li>

      <?php endif; ?>
    </ul>
  </nav>
</header>
