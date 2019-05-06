<?php
$menuNav = [
  "Home",
  "Quienes somos",
  "Productos",
  "Contacto",
];
$divCapsula=[];
for ($i=0; $i < 5; $i++) {
  if ($i%2==0) {
    $divCapsula[]='<div class="footer-capsula1"><img src="img/contorno_capsula.png" alt=""></div>';
  } else {
    $divCapsula[]='<div class="footer-capsula2"><img src="img/contorno_capsula.png" alt=""></div>';
  }
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FOOTER</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles-nav-footer.css">
  </head>
  <body>
    <footer>
      <div class="logo-footer">
        <img src="img/logo_sin_fondo_blanco.png" alt="Logo">
      </div>
      <div class="footer-navegacion">
        <div class="footer-capsulas">
          <?php foreach ($divCapsula as $capsula): ?>
            <?=$capsula?>
          <?php endforeach ?>
        </div>
        <ul>
          <?php foreach ($menuNav as $opciones): ?>
            <li><?=$opciones?></li>
          <?php endforeach ?>
        </ul>
        <div class="footer-capsulas">
          <?php foreach ($divCapsula as $capsula): ?>
            <?=$capsula?>
          <?php endforeach ?>
        </div>
      </div>
      <div class="redes-sociales">
        <h3>Seguinos en</h3>
        <div class="iconos">
          <i class="fab fa-facebook-f"></i>
          <i class="fab fa-instagram"></i>
        </div>
      </div>
    </footer>
  </body>
</html>
