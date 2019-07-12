<?php
require_once('User.php');
class UserValidator{

  protected $user;
  protected $errors=[];

  public function __construct (User $user)
    {
      $this->user=$user;
    }
  public function validateEmail($email,$resultado)
    {
      if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $this->errors['email'][]='El email no tiene el formato correcto';
        return $this;
      } elseif (!empty($resultado)){
        $this->errors['email'][] = 'El email ya se encuentra registrado';
      } else {
        return $this;
      }
    }
  public function validateLoginEmail($email,$resultado)
    {
      if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $this->errors['email'][]='El email no tiene el formato correcto';
        return $this;
      } elseif (empty($resultado)){
        $this->errors['email'][] = 'El email no se encuentra registrado';
      } else {
        return $this;
      }
    }
  public function validateEmpty($dato,$campo)
    {
      if(!isset($dato) || empty($dato)){
        $this->errors[$campo][]='Debe completar este campo';
        return $this;
      } else {
        return $this;
      }
    }
  public function validateUsername($username)
    {
      if(strlen($username)< 3 || strlen($username) > 10){
        $this->errors['username'][]='El usuario debe contener entre 3 y 10 caracteres';
        return $this;
      } else {
        return $this;
      }
    }
  public function validateIsNumeric($phoneNumber)
    {
      if (!is_numeric($phoneNumber)) {
        $this->errors['phoneNumber'][]= 'El teléfono no es un número';
        return $this;
      } else {
        return $this;
      }
    }
  public function validatePass($pass)
    {
      if (strlen($pass) < 8 || strlen($pass) > 12) {
        $this->errors['pass'][]= 'La contraseña debe tener entre 8 y 12 caracteres';
        return $this;
      } else {
        return $this;
      }
    }
  public function validatePassConfirm($pass,$confirmpass)
    {
      if ($pass!=$confirmpass) {
        $this->errors['confirmpass'][]='Las contraseñas no coinciden';
        return $this;
      } else{
        return $this;
      }
    }
  public function validateLoginPass($pass,$resultado)
    {
      if(!empty($resultado)){
        if ($pass != $resultado['password']) {
          $this->errors['pass'][]= 'La contraseña no es correcta';
        }
      }
    }
  public function validateTerms()
    {
      $this->errors['terms'][]= 'Debe aceptar los términos y condiciones';
      return $this;
    }

    public function validateAvatar()
      {
        if (empty($_FILES) || empty($_FILES['avatar']['name'])) {
          $this->errors['avatar'][]='Por favor seleccione una imagen';
        } else {
          $ext=pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);

          if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
            $this->$errors['avatar'][]='El archivo debe ser .jpg,.jpeg o .png';
          }
        }
      }
  public function getError($campo)
    {
      return $this->errors[$campo][0] ?? '';
    }
  public function IsErrorsEmpty(){
    return empty($this->errors);
  }
}
 ?>
