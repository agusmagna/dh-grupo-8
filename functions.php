<?php

function persistencia($variable){
  if(isset($_POST[$variable])){
    return $_POST[$variable];
  }

  return null;
}
function existe($variable){
  return isset($_POST[$variable]);
}
function vacio($variable){
  return empty($_POST[$variable]);
}

function verificacion($email){
  $archivo=file_get_contents('usuarios.json');
  $data=json_decode($archivo,true);
  foreach ($data as $usuario) {
    if ($usuario['email']==$email) {
      return true;
    }
  }
  return false;
}
function verificacion_pass($email, $password){
  $archivo=file_get_contents('usuarios.json');
  $data=json_decode($archivo,true);
  $hashpass= password_hash($_POST['password'],PASSWORD_DEFAULT);
  foreach ($data as $usuario) {
    if ($usuario['email']==$email && $usuario['pass']==$hashpass) {
      return true;
    }
  }
  return false;
}
 ?>
