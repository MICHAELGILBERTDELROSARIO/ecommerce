<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'ecommerce';

$con = mysqli_connect($host, $username, $password, $database); // CONNECTION

if(!$con){
  die('Connection failed:' . mysqli_connect_error()); // IF NOT CONNECT 
}else{
  return $con;
}

?>