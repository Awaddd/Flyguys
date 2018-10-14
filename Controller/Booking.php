<?php

require_once "../Helpers/Helpers.php";
require_once "../Model/Database.php";


if (empty($_SESSION['User_ID'])) {
  redirect('Controller/Login');
} else {
  require_once "../View/Checkout.php";
}

?>
