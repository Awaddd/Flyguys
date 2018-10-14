<?php

Class Flight{

  private $Flight_ID;
  private $FromDestination;
  private $ToDestination;
  private $DepartureDate;
  private $Duration;
  private $Description;
  private $LeaveTime;

  function __get($name){
    return $this->$name;
  }

  function __set($name, $value){
    $this->$name = $value;
  }


}

?>
