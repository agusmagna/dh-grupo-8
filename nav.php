<?php
if (strpos($_SERVER['SCRIPT_FILENAME'],'index.php')) {
  $menuNav = [
    "index.php"=>"Home",
    "#quienes-somos" => "Quienes somos",
    "#productos"=>"Productos",
    "contacto.php"=>"Contacto",
  ];
} else {
  $menuNav = [
    "index.php"=>"Home",
    "index.php#quienes-somos"=> "Quienes somos",
    "productos.php"=>"Productos",
    "contacto.php"=>"Contacto",
  ];
}
if (isset($_REQUEST['action']) && $_REQUEST['action']=='logout') {
  session_destroy();
  header('location:login.php');
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Navegador</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Syncopate" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles-nav-footer.css">
  </head>
  <body>
    <header>
      <div class="logo">
        <img src="img/logo_sin_fondo_blanco.png" alt="Logo">
      </div>
      <div class="nav">
        <nav>
          <ul>
            <?php foreach ($menuNav as $key=> $opciones): ?>
              <li> <a href="<?=$key?>"><?=$opciones?></a></li>
            <?php endforeach ?>
          </ul>
        </nav>
        <div class="login">
        <?php if (isset($_SESSION['email'])){ ?>
          <a href="perfil.php"><i class="far fa-user-circle"></i></a>
          <a href="?action=logout">Cerrar sesión</a>
        <?php } else { ?>
          <a href="login.php">Ingresar</a>
          <a href="register.php">Registrarse</a>
        <?php } ?>
        </div>
    </div>
    </header>
  </body>
</html>
