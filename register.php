<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      TIGOUT - Registro
    </title>
  </head>
  <body>
    <h1>
      Registro
    </h1>
    <form class="" action="index.php" method="post">
      <p>
        <label for="nombre">
          Nombre:
        </label>
        <input id="nombre" type="text" name="nombre" value="" required>
      </p>
      <p>
        <label for="email">
          E-mail:
        </label>
        <input id="email" type="email" name="email" value="" required>
      </p>
      <p>
        <label for="telefono">
          Teléfono (opcional):
        </label>
        <input id="telefono" type="text" name="telefono" value="">
      </p>
      <p>
        <label for="pass">
          Contraseña:
        </label>
        <input id="pass" type="password" name="pass" value="" required>
      </p>
      <p>
        <label for="confpass">
          Confirmar Contraseña:
        </label>
        <input id="confpass" type="password" name="confpass" value="" required>
      </p>
      <p>
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
      </p>
      <p>
        <button type="submit" name="button">
          Crear Cuenta
        </button>
        <button type="reset" name="button">
          Reiniciar
        </button>
      </p>
    </form>

  </body>
</html>
