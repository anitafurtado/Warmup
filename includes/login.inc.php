<?php

//checking if user got to this page properly
if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  require_once 'db.inc.php';
  require_once 'utilityFunc.inc.php';

  if(loginEmpty($username, $password) !== false){
    header("location: ../login.php?error=emptyField");
    exit();
  }

  loginUser($conn, $username, $password);
}
else {
  header("location: ../login.php");
  exit();
}
