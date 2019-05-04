<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      TIGOUT - Registro
    </title>
  </head>
  <body>
<section class="form-container">
    <form class="access-form" action="index.php" method="post">
      <h1>
        Registrate
      </h1>
      <div class="field-group">
        <label for="nombre">
          Nombre:
        </label>
        <input id="nombre" type="text" name="nombre" value="" required>
      </div>
      <div class="field-group">
        <label for="email">
          E-mail:
        </label>
        <input id="email" type="email" name="email" value="" required>
      </div>
      <div class="field-group">
        <label for="telefono">
          Teléfono (opcional):
        </label>
        <input id="telefono" type="text" name="telefono" value="">
      </div>
      <div class="field-group">
        <label for="pass">
          Contraseña:
        </label>
        <input id="pass" type="password" name="pass" value="" required>
      </div>
      <div class="field-group">
        <label for="confpass">
          Confirmar Contraseña:
        </label>
        <input id="confpass" type="password" name="confpass" value="" required>
      </div>
      <div class="field-group">
        <label for="conocio">
          ¿Cómo nos conoció?:
        </label>
        <select class="" name="conocio" id="conocio">
          <option value="rs">
            Redes Sociales
          </option>
          <option value="nm">
            Nota en medios
          </option>
          <option value="rc">
            Recomendación de un conocido
          </option>
          <option value="bi">
            Buscador de Internet
          </option>
          <option value="pg">
            Publicidad gráfica
          </option>
          <option value="ns">
            Negocios o Supermercados
          </option>
        </select>
      </div>

        <button type="submit" name="button">
          Crear Cuenta
        </button>
        
        <button type="reset" name="button">
          Reiniciar
        </button>

    </form>
</section>
  </body>
</html>
