<?php

class User
{
  protected $id;
  protected $email;
  protected $name;
  protected $surname;
  protected $country;
  protected $pass;
  protected $avatar;
  protected $phoneNumber;
  protected $met;

  public function getId(): integer{
    return $this->id;
  }
  public function getName(): string{
    return $this->name;
  }
  public function setName(string $name): string{
    $this->name=$name;
    return $this;
  }
  public function getSurname(): string{
    return $this->surname;
  }
  public function setSurname(string $surname): string{
    $this->surname=$surname;
    return $this;
  }
  public function getCountry(): string{
    return $this->country;
  }
  public function setCountry(string $country): string{
    $this->country=$country;
    return $this;
  }
  public function getPass(){
    return $this->pass;
  }
  public function setPass($pass){
    $this->pass=$pass;
    return $this;
  }
  public function getAvatar(): string{
    return $this->avatar;
  }
  public function setAvatar($archivo): string{
    $ext=pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
    $hashedname = md5($archivo['avatar']['name']. '.' . $ext);
    $path = 'imgavatar/' . $hashedname;
    $this->avatar = $path;
    return $this;
  }
  public function getPhoneNumber(): integer{
    return $this->phoneNumber;
  }
  public function setPhoneNumber(integer $phoneNumber): integer{
    $this->phoneNumber=$phoneNumber;
    return $this;
  }
  public function getMet(): string{
    return $this->met;
  }
  public function setMet(string $met): string{
    $this->met=$met;
    return $this;
  }
}



 ?>
