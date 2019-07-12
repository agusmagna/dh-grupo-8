<?php
session_start();
$productosCapsulas = [];
$saboresCodigo = ['chocofudge', 'blondie', 'scon','cookies','muffin', 'coquitos', 'crumble',];
$sabores = ['Chocofudge','Blondie','Scon','Cookies de avena','Muffin','Coquitos','Crumble de manzana',];
$precios = [];

for ($i=0; $i < count($saboresCodigo); $i++) {
  $key=$saboresCodigo[$i];
  $precios[$key]="$ 30";
}
$precios["chocofudge"]='$ 35';

foreach ($saboresCodigo as $key => $value) {
  $productosCapsulas[$key]["titulo"] = $sabores[$key];
  $productosCapsulas[$key]["imagen"] = 'img/producto-' . $value . ".png";
  $productosCapsulas[$key]["precio"] = $precios[$value] . ' c/u';
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>TIGOÛT - HOME</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">

  </head>
  <body>
    <?php require_once("nav.php") ?>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/slider1.png" class="d-block w-100" alt="TIGOUT">
      </div>
      <div class="carousel-item">
        <img src="img/maquinas.png" class="d-block w-100" alt="Máquinas">
      </div>
      <div class="carousel-item">
        <img src="img/productos_editada.png" class="d-block w-100" alt="productos">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Siguiente</span>
    </a>
  </div>
  <section id="quienes-somos">
    <h1>TIGOÛT</h1>
    <h1>UNA EMPRESA 100% ARGENTINA</h1>
    <div class="fundadores">
      <h2>Nuestros Fundadores</h2>
      <div class="fundador">
        <img src="img/fundador-rodrigo-cordoba.png" alt="Fundador">
        <img src="img/fundador-silvio-colombo.png" alt="Fundador">
        <img src="img/fundador-andrea-buttafuoco.png" alt="Fundador">
        <img src="img/fundador-maximiliano-raimondi.png" alt="Fundador">
      </div>
    </div>
    <article class="descripcion-empresa">
      <div class="comienzo">
      <h2>¿Cómo empezó esta aventura?</h2>
      <p>Todo comenzó en el 2016 cuando nuestro fundador Rodrigo Códoba se inspiró en la rapidez de Nespesso para obtener un café de calidad para inventar una máquina donde tambíen colocando una cápsula se obtenga un producto de pâtisserie super rico!</p>
      </div>
      <div class="recetas">
      <h2>Nuestras recetas</h2>
      <p>Nuestras recetas fueron armadas por Damián Betular y Daniela Tallarico, ambos pasteleros del  Palacio Duhau, todas propuestas de productos con aceptación mundial</p>
      </div>
    </article>
    <article class="descripcion-nombre">
      <h2>¿Sabés que significa TIGOÛT?</h2>
      <p>Es una palabra de origen francés que significa...</p>
      <div class="juego-nombre">
        <p class="consigna">¡Pasá el cursor por las opciones para descubrirlo!</p>
        <div class="opciones">
          <div class="opcion-juego">
            <p>Ricas <br>porciones</p>
          </div>
          <div class="opcion-juego">
            <p>Buena <br>pastelería</p>
          </div>
          <div class="opcion-juego">
            <p>Pequeños <br>gustos</p>
          </div>
        </div>
      </div>
    </article>
  </section>
  <section id="productos">
    <h1>Nuestros productos</h1>
    <div class="maquinas-capsulas">
      <article class="maquinas">
        <h1>La máquina de la pâtisserie</h1>
        <div class="imagen">
          <img src="img/maquinasx6.png" alt="Máquinas en distintos colores">
        </div>
        <h2>¿Todavía no tenés la tuya?</h2>
        <h2>Comprala <a href="comprar.php">acá</a> </h2>
      </article>
      <article class="capsulas">
        <h1>Cápsulas <br> destacadas</h1>
        <div class="productos-destacados">
          <?php for ($i=0;$i<4;$i++):?>
            <div class="producto">
              <div class="imagen">
                <img src="<?= $productosCapsulas[$i]["imagen"];?>" alt="producto">
              </div>
              <div class="titulo">
                <?=$productosCapsulas[$i]["titulo"];?>
              </div>
              <div class="precio">
                <?=$productosCapsulas[$i]["precio"];?>
              </div>
            </div>
            <?php endfor ?>
          </div>
      </article>
    </div>
  </section>

  <?php require_once("footer.php") ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
