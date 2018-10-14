<?php
require_once "../Helpers/Helpers.php";
require_once "../Model/Database.php";


$db = new Database();

$destinationList = $db->getDestinations();

require_once "../View/Home.php";





?>
