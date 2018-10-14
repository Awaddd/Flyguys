<?php

require_once "../Helpers/Helpers.php";
require_once "../Model/Database.php";

$db = new Database();
$schedule = $db->getSchedule();
$destinations = $db->getAllDestinations();


if (isset($_POST['addDestination'])) {
  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

  $destinationName = trim($_POST['Destination']);
  $destinationType = trim($_POST['Type']);
  $duration = trim($_POST['Duration']);

  $db->createDestination($destinationName);

  $stanstead = "1";

  $newDestination = $db->getLastDestination();

  if ($destinationType === "Domestic") {
    //Domestic
    $domesticFromDeparture = "08:30:00";
    $domesticToDeparture = "18:00:00";
    $destinationTypeFrom = "1";
    $destinationTypeTo = "2";

  } else if ($destinationType === "Europe"){
    //Europe
    $europeFromDeparture = "08:00:00";
    $europeToDeparture = "18:30:00";
    $destinationTypeFrom = "3";
    $destinationTypeTo = "4";
  }

  $db->createFlightSchedule($stanstead, $newDestination, $destinationTypeFrom, $duration);
  $db->createFlightSchedule($newDestination, $stanstead, $destinationTypeTo, $duration);
}

if (isset($_POST['editDestination'])) {
  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  $newDestinationName = trim($_POST['newDestinationName']);
  $newDuration = trim($_POST['newDuration']);
  $oldDestination = trim($_POST['oldDestination']);

  if ($oldDestination != 1) {
    if ($newDestinationName) {
      // Update destination with new name
        $db->updateDestination($newDestinationName, $oldDestination);
    }

    if ($newDuration) {
      // Update both schedules with new duration
      $db->updateSchedule($oldDestination, $newDuration);
    }
  } else {
    if ($newDestinationName) {
      // Update destination with new name
        $db->updateDestination($newDestinationName, $oldDestination);
    }
  }
}

if (isset($_POST['deleteDestination'])) {
  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

  $deleteDes = trim($_POST['deleteDes']);

  $db->deleteDestination($deleteDes);
}


if (empty($_SESSION['Admin'])) {
  redirect('Controller/Landing');
} else {
  require_once "../View/AdminDestinationsView.php";
}


?>
