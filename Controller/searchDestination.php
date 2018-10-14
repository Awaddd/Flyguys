<?php
require_once "../Helpers/Helpers.php";
require_once "../Model/Destination.php";
require_once "../Model/Database.php";

$db = new Database();


$destinationList = $db->getDestinations();



if(isset($_REQUEST['ToLocation'])){

    $ToDate = $_REQUEST['ToDate'];
    $FromDate = $_REQUEST['FromDate'];


  if($_REQUEST['ToLocation'] == 'Any'){
    $ToDes = 1;
  }else{
    $ToDes = $_REQUEST['ToLocation'];
  }
  if(!$_REQUEST['ToDate']){
    $ToDate = '0000-00-00';
  }
  if(!$_REQUEST['FromDate']){
    $FromDate = '9999-00-00';
  }
  if($_REQUEST['DayOfWeek'] == 'AnyDay'){
    $Day = 1;
  }else{
    $Day = $_REQUEST['DayOfWeek'];
  }

  $outboundDes = $db->searchOutboundFlights($ToDes, $ToDate, $FromDate, $Day);
  $inboundDes = $db->searchInboundFlights($ToDes, $ToDate, $FromDate, $Day);
}else{
  $outboundDes = $db->getOutboundFlights();
  $inboundDes = $db->inboundFlights();
}


// echo '<pre>';
// print_r ($_REQUEST);
// echo  '</pre>';


require_once "../View/FlightsView.php";


 ?>
