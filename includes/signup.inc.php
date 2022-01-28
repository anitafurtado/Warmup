<?php

//checking if user got to this page properly
if (isset($_POST["submit"])) {
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $email = $_POST["email"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $reenterPass = $_POST["reenterPass"];

  require_once 'db.inc.php';
  require_once 'utilityFunc.inc.php';


  //error checking
  if(signUpEmpty($firstName, $lastName, $email, $username, $password, $reenterPass) !== false){
    header("location: ../signup.php?error=emptyField");
    exit();
  }

  if(invalidEmail($email) !== false){
    header("location: ../signup.php?error=invalidEmail");
    exit();
  }

  if(passwordMatch($password, $reenterPass) !== false){
    header("location: ../signup.php?error=passwordsDoNotMatch");
    exit();
  }

  if(passwordLength($password) !== false){
    header("location: ../signup.php?error=passwordLengthInvalid");
    exit();
  }

  if(usernameExists($conn, $username) !== false){
    header("location: ../signup.php?error=usernameAlreadyExists");
    exit();
  }

  createNewUser($conn, $firstName, $lastName, $email, $username, $password);

} else {
  header("location: ../signup.php");
  exit();
}
