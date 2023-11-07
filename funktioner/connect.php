<?php
// used to connect to the database
$host = "localhost";
$db_name = "products";
$username = "root";
$password = "";
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>
<?php
//login credentials
// $serverName="localhost";
// $user="root";
// $password="";
// $db="products";

//create connection
// $dbConnect = mysqli_connect($serverName,$user,$password);

//check connection
//  if(!$dbConnect){
//      echo"ERROR!";
//  }
//  else{
//      echo"SUCCESS!";
//  }
//create database
// $productDatabase = "CREATE DATABASE products";

//database check: works

// if(!$dbConnect->query($productDatabase)){
//     echo"ERROR CREATING DTABASE";
// }else{
//     echo"SUCCESSFULLY CREATED DATABASE";
// }
//close connection

// $dbConnect=null;
//reconnect with new database
// $productConnect = mysqli_connect($serverName,$user,$password,$db);
// check connection
//works
// if ($productConnect->connect_error) {
//     die("Connection failed: " . $productConnect->connect_error);
//   }
//create table
// $productTable = "CREATE TABLE productInfo(
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     productName VARCHAR(30) NOT NULL,
//     productDescription text NOT NULL,
//     price double NOT NULL,
//     created datetime NOT NULL,
//     modified timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";
//creation check
//WORKS
// if ($productConnect->query($productTable) === TRUE) {
//     echo "Table productInfo created successfully";
//   } else {
//     echo "Error creating table: " . $productConnect->error;
//   }
  
//sample data

  // $sampleData="INSERT INTO productInfo (id, productName, productDescription) VALUES
  //  ('1', 'idk', 'idkDescription')";
  // mysqli_query($productConnect,$sampleData);
  ////////////////////////////////////////////////////
  //Gave up and added through console in phpMyAdmin//
  //////////////////////////////////////////////////


  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //INSERT INTO `productInfo` (`id`, `productName`, `productDescription`, `price`, `created`, `modified`) VALUES
  //(1, 'Basketball', 'A ball used in the NBA.', 49.99, '2015-08-02 12:04:03', '2015-08-06 06:59:18'),
  //(3, 'Gatorade', 'This is a very good drink for athletes.', 1.99, '2015-08-02 12:14:29', '2015-08-06 06:59:18'),
  //(4, 'Eye Glasses', 'It will make you read better.', 6, '2015-08-02 12:15:04', '2015-08-06 06:59:18'),
  //(5, 'Trash Can', 'It will help you maintain cleanliness.', 3.95, '2015-08-02 12:16:08', '2015-08-06 06:59:18'),
  // (6, 'Mouse', 'Very useful if you love your computer.', 11.35, '2015-08-02 12:17:58', '2015-08-06 06:59:18'),
  // (7, 'Earphone', 'You need this one if you love music.', 7, '2015-08-02 12:18:21', '2015-08-06 06:59:18'),
  // (8, 'Pillow', 'Sleeping well is important.', 8.99, '2015-08-02 12:18:56', '2015-08-06 06:59:18');
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////