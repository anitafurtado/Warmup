<?php

$serverName = "localhost";
$DBusername = "root";
$DBpassword = "";
$DBName = "warmupproject";

$conn = mysqli_connect($serverName, $DBusername, $DBpassword, $DBName);

if(!$conn){
  die("Database connection failed" . mysqli_connect_error());
}
