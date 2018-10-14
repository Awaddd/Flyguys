<?php

require_once "../Helpers/Helpers.php";
require_once "../Model/Database.php";

$db = new Database();


// REGISTER

if (isset($_POST['register'])) {
  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

  $username = trim($_POST['Username']);
  $password = trim($_POST['Password']);
  $password = password_hash($password, PASSWORD_DEFAULT);

  if ($db->register($username, $password)) {
    redirect('Controller/Login');
  }

}

require_once "../View/Register.php";
