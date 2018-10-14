<?php

Class User {

  private $User_ID;
  private $Username;
  private $Password;
  private $UserType;

  function __get($name){
    return $this->$name;
  }

  function __set($name, $value){
    $this->$name = $value;
  }
}

?>
