<?php

  session_start();

  define("URLROOT", "http://localhost:1234/Flyguys");

  function redirect($url){
    header("location: " . URLROOT . "/" . $url . '.php');
  }

  if (isset($_POST['logout'])) {
    unset($_SESSION['User_ID']);
    session_destroy();
    redirect('Controller/Login');
  }

  if (!isset($_SESSION['ShoppingBasket'])) {
      $_SESSION['ShoppingBasket']=array();
  }

  function cartCount(){
    return count($_SESSION['ShoppingBasket']);
  }
?>
