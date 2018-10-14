<?php

Class Schedule {

  private $Schedule_ID;
  private $FromDestination;
  private $ToDestination;
  private $Duration;
  private $arrivalTime;
  private $destination_type;

  function __get($name){
    return $this->$name;
  }

  function __set($name, $value){
    $this->$name = $value;
  }
}

?>
