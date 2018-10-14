<?php


Class Destination {

  private $Destination_ID;
  private $DestinationName;

  function __get($name){
    return $this->$name;
  }

  function __set($name, $value){
    $this->$name = $value;
  }

}
?>
