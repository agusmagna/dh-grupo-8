<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>TIGOUT - Contacto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/contacto.css">
  </head>
  <body>
    <?php require_once("nav.php") ?>
    <section id="contacto">
      <div class="contact-container">
      <h1>Tu comentario nos interesa</h1>
      <form class="contact-form" action="index.php" method="post">
        <div class="field-contact">
          <label for="nombre">
            Nombre:
          </label>
          <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="" required>
        </div>
          <div class="field-contact">
            <label for="email">
              E-mail:
            </label>
            <input type="email" id="email" name="email" placeholder="Email" value="" required>
          </div>
          <div class="field-contact">
            <label for="Comentarios">
              Comentarios:
            </label>
          <p><textarea name="comments" rows="8" cols="97"> </textarea></p>
          <button type="submit" name="send">Enviar</button>
        </form>
        </div>
      </section>


    <?php require_once("footer.php") ?>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
