<?php
$dsn = "mysql:dbname=tigout_db;host:127.0.0.1;port=3306";
$usuario = "root";
$pass = "root";

try {
$baseDeDatos = new PDO ($dsn, $usuario, $pass);
$baseDeDatos -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\Exception $e) {
  var_dump($e->getMessage());
  echo "Hubo un error de conexion";
}
  echo "Bienvenido, la conexion a la base fue exitosa";

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $usuario = $_POST['usuario'];
  $pais = $_POST['pais'];
  $telefono = $_POST['telefono'];
  $pass = $hashpass;
  $avatar = $path;

  $consulta = $baseDeDatos->prepare ("INSERT into users values(default,'$nombre', '$apellido', '$email', '$usuario', '$pais', null, '$avatar', null, '$pass' )");

  $consulta -> execute();

 ?>
