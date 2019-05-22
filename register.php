<?php
require_once('functions.php');

$conocio=[
  'so'=>'-Seleccione una opción-',
  'rs'=>'Redes Sociales',
  'nm'=>'Nota en medios',
  'rc'=>'Recomendación de un conocido',
  'bi'=>'Buscador de Internet',
  'pg'=>'Publicidad gráfica',
  'ns'=>'Negocios o Supermercados',
];

$errors=[];


if (existe('nombre')) {
  if (vacio('nombre')) {
      $errors['nombre'][]='Debe completar el nombre';
  }
}
if (existe('apellido')) {
  if (vacio('apellido')){
    $errors['apellido'][]='Debe completar el apellido';
  }
}
if (existe('email')) {
  if (vacio('email')){
    $errors['email'][]='Debe completar el email';
  } elseif (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
    $errors['email'][]='El mail no tiene el formato correcto';
  }
}
if (existe('usuario')) {
  if (vacio('usuario')){
    $errors['usuario'][]='Debe completar el usuario';
  } elseif (strlen($_POST['usuario'])< 3 || strlen($_POST['usuario']) > 10){
    $errors['usuario'][]='El usuario debe contener entre 3 y 10 caracteres';
  }
}
if (existe('pais')) {
  if (vacio('pais')){
    $errors['pais'][]='Debe completar el país de nacimiento';
  }
}
if (existe('telefono')) {
  if (!empty($_POST['telefono']) && !is_numeric($_POST['telefono'])){
    $errors['telefono'][]='El teléfono no es un número';
  }
}
if(empty($_FILES) || empty($_FILES['avatar']['name'])){
  $errors['avatar'][]='Por favor seleccione una imagen';
  } else {
    $ext=pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);

    if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
      $errors['avatar'][]='El archivo debe ser .jpg,.jpeg o .png';
    }
  }
  if (existe('pass')) {
    if (vacio('pass')){
      $errors['pass'][]='Debe completar la contraseña';
    } elseif (strlen($_POST['pass']) < 8 || strlen($_POST['pass']) > 12){
        $errors['pass'][]='La contraseña debe tener entre 8 y 12 caracteres';
    }
    if (existe('confpass')) {
      if (vacio('confpass')){
    if ($_POST['pass']!= $_POST['confpass']){
        $errors['confpass'][]= 'Las contraseñas no coinciden';
      }
    }
  }
}
if (!isset($_POST['terms'])){
      $errors['terms'][]= 'Debe aceptar los términos y condiciones';
  }
if(empty($errors)){
  $hashedname = md5($_FILES['avatar']['name']. '.' . $ext);
  $path = 'imgavatar/' . $hashedname;
  move_uploaded_file($_FILES['avatar']['tmp_name'],$path);
  $hashpass= password_hash($_POST['pass'],PASSWORD_DEFAULT);
  $usuario = [
    'nombre'=>$_POST['nombre'],
    'apellido'=>$_POST['apellido'],
    'pais'=>$_POST['pais'],
    'email'=>$_POST['email'],
    'usuario'=>$_POST['usuario'],
    'pass'=> $hashpass,
    'avatar'=> $path,
  ];
  if (existe('telefono')){
    $usuario['telefono']=$_POST['telefono'];
  }
  if (existe('conocio')){
    $usuario['conocio']=$_POST['conocio'];
  }
  $archivo=file_get_contents('usuarios.json');
  $data=json_decode($archivo,true);
  $data[]=$usuario;
  $jsonFinal=json_encode($data);
  file_put_contents('usuarios.json',$jsonFinal);
  header('location:index.php');
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
    <div class="contenedor-register">
    <?php require_once("nav.php") ?>
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
        <p><?= $errors['nombre'][0] ?? ''?></p>
      </div>
      <div class="field-group">
        <label for="apellido">
          Apellido:
        </label>
        <input id="apellido" type="text" name="apellido" value="<?= persistencia('apellido')?>">
        <p><?= $errors['apellido'][0]?? ''?></p>
      </div>

      <div class="field-group">
        <label for="email">
          E-mail:
        </label>
        <input id="email" type="text" name="email" value="<?= persistencia('email')?>">
        <p><?= $errors['email'][0] ?? ''?></p>
      </div>

      <div class="field-group">
        <label for="usuario">
          Usuario:
        </label>
        <input id="usuario" type="text" name="usuario" value="<?= persistencia('usuario')?>">
        <p><?= $errors['usuario'][0] ?? ''?></p>
      </div>
      <div class="field-group">
        <label for="pais">
          País de nacimiento:
        </label>
        <input id="pais" type="text" name="pais" value="<?= persistencia('pais')?>">
        <p><?= $errors['pais'][0] ?? ''?></p>
      </div>
      <div class="field-group">
        <label for="telefono">
          Teléfono (opcional):
        </label>
        <input id="telefono" type="text" name="telefono" value="<?= persistencia('telefono')?>">
        <p><?= $errors['telefono'][0] ?? ''?></p>
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
        <p><?= $errors['pass'][0] ?? ''?></p>
      </div>
      <div class="field-group">
        <label for="confpass">
          Confirmar Contraseña:
        </label>
        <input id="confpass" type="password" name="confpass" value="" >
        <p><?= $errors['confpass'][0] ?? ''?></p>
      </div>

      <div class="field-group terms">
        <input type="checkbox" id="terms" name="terms" value="si">
        <label for="terms">Acepto los términos y condiciones</label>
        <p><?= $errors['terms'][0] ?? ''?></p>
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
