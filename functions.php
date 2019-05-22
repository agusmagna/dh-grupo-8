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
 ?>
