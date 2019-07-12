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
  public function setName(string $name){
    $this->name=$name;
    return $this;
  }
  public function getEmail(): string{
    return $this->email;
  }
  public function setEmail(string $email){
    $this->email=$email;
    return $this;
  }
  public function getSurname(): string{
    return $this->surname;
  }
  public function setSurname(string $surname){
    $this->surname=$surname;
    return $this;
  }
  public function getUsername(): string{
    return $this->username;
  }
  public function setUsername(string $username){
    $this->username=$username;
    return $this;
  }
  public function getCountry(): string{
    return $this->country;
  }
  public function setCountry(string $country){
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
  public function setAvatar($archivo){
    $ext=pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
    $hashedname = md5($archivo['avatar']['name']. '.' . $ext);
    $path = 'imgavatar/' . $hashedname;
    $this->avatar = $path;
    return $this;
  }
  public function setAvatarLogin($avatar){
    $this->avatar = $avatar;
    return $this;
  }
  public function getPhoneNumber(){
    return $this->phoneNumber;
  }
  public function setPhoneNumber($phoneNumber){
    $this->phoneNumber=$phoneNumber;
    return $this;
  }
  public function getMet(): string{
    return $this->met;
  }
  public function setMet(string $met){
    $this->met=$met;
    return $this;
  }
}



 ?>
