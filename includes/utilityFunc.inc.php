<?php
function signUpEmpty($firstName, $lastName, $email, $username, $password, $reenterPass) {
  if(empty($firstName) || empty($lastName) || empty($email) || empty($username) || empty($password) || empty($reenterPass)){
    return true;
  } else {
    return false;
  }
}

function invalidEmail($email) {
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    return true;
  } else {
    return false;
  }
}

function passwordMatch($password, $reenterPass) {
  if($password !== $reenterPass){
    return true;
  } else {
    return false;
  }
}

function passwordLength($password) {
  if(strlen($password)<8){
    return true;
  } else {
    return false;
  }
}

function usernameExists($conn, $username) {
  //secure - no sql injection
  $sql = "SELECT * FROM users WHERE username = ?;";
  $statement = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($statement, $sql)) {
    header("location: ../signup.php?error=statementFailed");
    exit();
  }

  mysqli_stmt_bind_param($statement, "s", $username);
  mysqli_stmt_execute($statement);

  $queryData = mysqli_stmt_get_result($statement);
  if ($rowResult = mysqli_fetch_assoc($queryData)) {
    //use to help user login
    return $rowResult;
  } else {
    return false;
  }
  mysqli_stmt_close($statement);
}

function createNewUser($conn, $firstName, $lastName, $email, $username, $password) {
  //secure - no sql injection
  $sql = "INSERT INTO users (username, password, firstName, lastName, email) VALUES (?, ?, ?, ?, ?);";
  $statement = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($statement, $sql)) {
    header("location: ../signup.php?error=statementFailed");
    exit();
  }

  $hashPassword = password_hash($password, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($statement, "sssss", $username, $hashPassword, $firstName, $lastName, $email);
  mysqli_stmt_execute($statement);
  mysqli_stmt_close($statement);
  loginUser($conn, $username, $password);
  // header("location: ../index.php?error=signupSuccessful");
  exit();
}

function loginEmpty($username, $password) {
  if(empty($username) || empty($password)){
    return true;
  } else {
    return false;
  }
}

function loginUser($conn, $username, $password) {
  $usernameExists = usernameExists($conn, $username);
  if ($usernameExists === false) {
    header("location: ../login.php?error=incorrectUsernameOrPassword");
    exit();
  }

  $DBpassword = $usernameExists["password"]; //associative array - names for each index/column
  $passwordCheck = password_verify($password, $DBpassword);

  if ($passwordCheck === false) {
    header("location: ../login.php?error=incorrectUsernameOrPassword");
    exit();
  }
  else if ($passwordCheck === true){
    session_start();
    $_SESSION["sessionID"] = $usernameExists["id"];
    $_SESSION["sessionUsername"] = $usernameExists["username"];
    $_SESSION["sessionFirstName"] = $usernameExists["firstName"];
    header("location: ../index.php");
    exit();
  }
}
