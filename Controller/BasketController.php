<?php
require_once "../Helpers/Helpers.php";
require_once "../Model/Database.php";

if (!isset($_SESSION['ShoppingBasket'])) {
    $_SESSION['ShoppingBasket']=array();
}

$db = new Database();


if (isset($_REQUEST['addToBasket'])) {
$flight = $db->getSingleFlight($_REQUEST['flightID']);

if($flight){
  array_push($_SESSION['ShoppingBasket'], $flight);
  echo count($_SESSION['ShoppingBasket']);
}
}

if (isset($_REQUEST['remove'])) {
  if(isset($_REQUEST['index'])){
    $key = $_REQUEST['index'];
    // $key = $key-1;
    // echo '<pre>';
    // print_r ($_SESSION['ShoppingBasket']);
    // echo  '</pre>';
    unset($_SESSION['ShoppingBasket'][$key]);
    echo count($_SESSION['ShoppingBasket']);
  }
}
// }else{
// // if (isset($_REQUEST['addToBasket'])&&$_REQUEST['addToBasket']=='outbound') {
// $flight = $db->getSingleInboundFlight($_REQUEST['flightID']);
//
// if($flight){
//   array_push($_SESSION['ShoppingBasket'], $flight);
//   echo count($_SESSION['ShoppingBasket']);
// }
// }



 ?>
