<?php

require_once "../Helpers/Helpers.php";
require_once "../Model/Database.php";

$db = new Database();


// LOGIN

if (isset($_POST['login'])) {
  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


  $username = trim($_POST['Username']);
  $password = trim($_POST['Password']);

  $user = $db->login($username, $password);

  if ($user[0]) {

    if ($user[0]->UserType == 2) {
      $_SESSION['User_ID'] = $user[0]->User_ID;
      redirect('Controller/Landing');

    } else if ($user[0]->UserType == 1){
      $_SESSION['Admin'] = $user[0]->User_ID;
      redirect('Controller/AdminDestinations');
    }

  }

}

require_once "../View/Login.php";
