<?php
require_once('functions.php');
require_once('Class/UserValidator.php');
require_once('Class/User.php');
require_once('Class/Db.php');

DB::$HOST = 'localhost';
DB::$DBNAME = 'tigout_db';
DB::$USER = 'root';
DB::$PASS = '';

$conocio=[
  'so'=>'-Seleccione una opción-',
  'rs'=>'Redes Sociales',
  'nm'=>'Nota en medios',
  'rc'=>'Recomendación de un conocido',
  'bi'=>'Buscador de Internet',
  'pg'=>'Publicidad gráfica',
  'ns'=>'Negocios o Supermercados',
];

if ($_POST) {
  $usuario = new User;
  $validator = new UserValidator($usuario);
  $validator->validateEmpty($_POST['nombre'],'name')
            ->validateEmpty($_POST['apellido'],'surname')
            ->validateEmpty($_POST['email'],'email')
            ->validateEmpty($_POST['usuario'],'username')
            ->validateEmpty($_POST['pais'],'country')
            ->validateEmpty($_POST['pass'],'pass')
            ->validateEmpty($_POST['confpass'],'confirmpass');
  $validator->validateUsername($_POST['usuario']);
  $validator->validateAvatar();
  if (!vacio('telefono')) {
    $validator->validateIsNumeric($_POST['telefono']);
  }
  $validator->validatePass($_POST['pass'])
            ->validatePassConfirm($_POST['pass'],$_POST['confpass']);
  if (!isset($_POST['terms'])){
        $validator->validateTerms();
    }


  $pdo = DB::getInstance();
  $consulta = $pdo->prepare("SELECT email from users WHERE email = :email ");
  $consulta ->bindValue('email', $_POST['email']);
  $consulta->execute;
  $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);
  $validator->validateEmail($_POST['email'],$resultado);
  unset($pdo);


if($validator->IsErrorsEmpty()){
  $usuario->setAvatar($_FILES);
  move_uploaded_file($_FILES['avatar']['tmp_name'],$usuario->getAvatar());
  $hashpass= password_hash($_POST['pass'],PASSWORD_DEFAULT);

  $usuario->setName($_POST['nombre'])
          ->setSurname($_POST['apellido'])
          ->setCountry($_POST['pais'])
          ->setEmail($_POST['email'])
          ->setUsername($_POST['usuario'])
          ->setPass($hashpass);
  if (!vacio('telefono')){
    $usuario->setPhoneNumber($_POST['telefono']);
  }
  if (!vacio('conocio')){
    $usuario->setMet($_POST['conocio']);
  }

  $pdo = DB::getInstance();
  $insert = $pdo->prepare("INSERT into users VALUE(NULL,:nombre,:apellido,:email,:usuario,:pais,:telefono,:avatar,:met,:pass)");
  $insert->bindValue('nombre',$usuario->getName());
  $insert->bindValue('apellido',$usuario->getSurname());
  $insert->bindValue('pais',$usuario->getCountry());
  $insert->bindValue('email',$usuario->getEmail());
  $insert->bindValue('usuario',$usuario->getUsername());
  $insert->bindValue('pass',$usuario->getPass());
  $insert->bindValue('telefono',$usuario->getPhoneNumber());
  $insert->bindValue('met',$usuario->getMet());
  $insert->bindValue('avatar',$usuario->getAvatar());

  $insert->execute();
  unset($pdo);
  header('location:registroExitoso.php');
}

}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>
      TIGOÛT - Registro
    </title>
  </head>
  <body>
    <?php require_once("nav.php") ?>
    <div class="contenedor-register">
    <section class="form-container">
    <form class="access-form" action="register.php" method="post" enctype="multipart/form-data">
      <h1>
        Registrate
      </h1>
      <div class="field-group">
        <label for="nombre">
          Nombre:
        </label>
        <input id="nombre" type="text" name="nombre" value="<?= persistencia('nombre')?>">
        <p><?= isset($validator) ? $validator->getError('name') : ''?></p>
      </div>
      <div class="field-group">
        <label for="apellido">
          Apellido:
        </label>
        <input id="apellido" type="text" name="apellido" value="<?= persistencia('apellido')?>">
        <p><?= isset($validator) ? $validator->getError('surname'): ''?></p>
      </div>

      <div class="field-group">
        <label for="email">
          E-mail:
        </label>
        <input id="email" type="text" name="email" value="<?= persistencia('email')?>">
        <p><?= isset($validator) ? $validator->getError('email') : ''?></p>
      </div>

      <div class="field-group">
        <label for="usuario">
          Usuario:
        </label>
        <input id="usuario" type="text" name="usuario" value="<?= persistencia('usuario')?>">
        <p><?= isset($validator) ? $validator->getError('username') : ''?></p>
      </div>
      <div class="field-group">
        <label for="pais">
          País de nacimiento:
        </label>
        <input id="pais" type="text" name="pais" value="<?= persistencia('pais')?>">
        <p><?= isset($validator) ? $validator->getError('country') : ''?></p>
      </div>
      <div class="field-group">
        <label for="telefono">
          Teléfono (opcional):
        </label>
        <input id="telefono" type="text" name="telefono" value="<?= persistencia('telefono')?>">
        <p><?= isset($validator) ? $validator->getError('phoneNumber'): '' ?></p>
      </div>
      <div class="field-group">
        <label for="avatar">
          Foto de perfil:
        </label>
        <input id="avatar" type="file" name="avatar">
        <p><?= $errors['avatar'][0] ?? ''?></p>
      </div>
      <div class="field-group">
        <label for="conocio">
          ¿Cómo nos conoció?:
        </label>
        <select class="" name="conocio" id="conocio">
          <?php foreach ($conocio as $key => $opcion) : ?>
          <?php if($_POST['conocio']==$key) :?>
            <option value="<?=$key?>" selected>
              <?=$opcion?>
            </option>
          <?php else: ?>
            <option value="<?=$key?>">
              <?=$opcion?>
            </option>
          <?php endif;?>
        <?php endforeach; ?>
        </select>
      </div>
      <div class="field-group">
        <label for="pass">
          Contraseña:
        </label>
        <input id="pass" type="password" name="pass" value="" >
        <p><?= isset($validator) ? $validator->getError('pass'): ''?></p>
      </div>
      <div class="field-group">
        <label for="confpass">
          Confirmar Contraseña:
        </label>
        <input id="confpass" type="password" name="confpass" value="" >
        <p><?= isset($validator) ? $validator->getError('confirmpass'): ''?></p>
      </div>

      <div class="field-group terms">
        <input type="checkbox" id="terms" name="terms" value="si">
        <label for="terms">Acepto los términos y condiciones</label>
        <p><?= isset($validator) ? $validator->getError('terms'): ''?></p>
      </div>

        <button type="submit" name="button">
          Crear Cuenta
        </button>

        <button type="reset" name="button">
          Reiniciar
        </button>

    </form>
  </section>
  <?php require_once("footer.php") ?>
  </div>


  </body>
</html>
