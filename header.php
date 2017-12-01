<?php require_once("soporte.php"); ?>
<header id="header">
  <!-- Barra de navegación -->
  <nav class="navigation">
    <ul class="navigation-menu">
      <li><a href="home.php" class="navigation-user-logo">
        <img src="icons/logo.png" alt="Logo"></a>
      </li>
    </ul>
    <ul class="navigation-user">
      <?php
      if(!$auth->estaLogueado()) : ?>
      <li><a href="ingresa.php" class="navigation-user-link">Ingresá</a></li>
      <li><a href="registrate.php" class="navigation-menu-link">Registrate</a></li>
      <li><a href="ayuda.php" class="navigation-menu-link">Ayuda</a></li>
      <?php endif; ?>

      <?php if ($auth->estaLogueado()) : ?>
        <li>
          <span class="navigation-menu-link">Bienvenido <?=$auth->obtenerUsuarioLogueado($db)->getNombre()?>
        </span></li>
        <li><a href="logout.php" class="navigation-user-link">Salir</a></li>
        <li><a href="ayuda.php" class="navigation-menu-link">Ayuda</a></li>
      <?php endif; ?>

    </ul>
  </nav>
</header>
