<?php
//login credentials
$serverName="localhost";
$user="root";
$password="";
$db="products";

//create connection
$dbConnect = mysqli_connect($serverName,$user,$password);

//check connection
 if(!$dbConnect){
     echo"ERROR!";
 }
 else{
     echo"SUCCESS!";
 }
//create database
$productDatabase = "CREATE DATABASE products";

//database check: works

// if(!$dbConnect->query($productDatabase)){
//     echo"ERROR CREATING DTABASE";
// }else{
//     echo"SUCCESSFULLY CREATED DATABASE";
// }
//close connection

$dbConnect=null;
//reconnect with new database
$productConnect = mysqli_connect($serverName,$user,$password,$db);
// check connection
//works
if ($productConnect->connect_error) {
    die("Connection failed: " . $productConnect->connect_error);
  }

$productTable = "CREATE TABLE productInfo(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(30) NOT NULL,
    price INT(9) NOT NULL,
)";
if ($productConnect->query($productTable) === TRUE) {
    echo "Table MyGuests created successfully";
  } else {
    echo "Error creating table: " . $productConnect->error;
  }
echo"hi";
