<!-- Background image -->
<img src="./img/bg.png" class="achtergrond">
<!-- Logo -->
<img src="./img/logo.png" class="logo">
<div class="dropdown">
  <!-- Image is used as a button for devices smaller than 700px wide to open the nav buttons -->
  <img src="./img/strepen.png">
  <?php
  $currentFile = $_SERVER["SCRIPT_NAME"];
  $activePage = basename($currentFile, ".php");
  ?>
  <div class="dropdown-content">
    <?php
    if (isset($_SESSION['loggedIn'])) {
    ?>
      <a href="<?php if ($_SESSION['employee'] == 1) {
                          echo './beheermedewerker.php';
                        } else {
                          echo './beheerklant.php';
                        } ?>" <?php if ($activePage == "reservatiebeheer") echo 'class="active"'; ?>>Reservatiebeheer</a>
    <?php
    }
    ?>
    <a href="./reserveren.php" <?php if ($activePage == "reserveren") echo 'class="active"'; ?>>Reserveren</a>
    <?php
    if (isset($_SESSION['loggedIn'])) {
    ?>
      <a href="php/inc/logout.php" <?php if ($activePage == "loguit") echo 'class="active"'; ?>>Log uit</a>
    <?php
    } else {
    ?>
      <a href="./registratie.php" <?php if ($activePage == "registratie") echo 'class="active"'; ?>>registreer</a>
      <a href="./login.php" <?php if ($activePage == "login") echo 'class="active"'; ?>>Login</a>
    <?php
    }
    ?>
    <a href="./overons.php" <?php if ($activePage == "overons") echo 'class="active"'; ?>>Over ons</a>
    <a href="./index.php" <?php if ($activePage == "index") echo 'class="active"'; ?>>Hoofdpagina</a>
  </div>
</div>
