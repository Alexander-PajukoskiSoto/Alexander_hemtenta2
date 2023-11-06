<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud_app</title>
</head>
<body>
<div id="wrapper">


<form method="POST" action="" enctype="multipart/form-data">        

    <input type="file" name="choosefile" value="" />

    <div>

        <button type="submit" name="uploadfile">

        UPLOAD

        </button>

    </div>

</form>

</div>


    <?php
    //define servername user password and name of database
    // $serverName = "localhost";
    // $dbmsUser = "root";
    // $dbmsPassword = "";
    // $dbName = "crud_app";
    // // connect
    // $dbmsConnect = mysqli_connect($serverName,$dbmsUser,$dbmsPassword);
    // //make database
    // $sqlCreateDataBase = "CREATE DATABASE products";
    // //creates it
    // // variable that creates a table
    // $sqlCreateTableProduct = "CREATE TABLE product(
    //     productID INT AUTO_INCREMENT PRIMARY KEY,
    //     productName VARCHAR, price INT,
    //     productImage IMAGE)";   



    // //connected
    // if ($dbmsConnect->connect_error) {
    //     die("Connection failed: " . $dbmsConnect->connect_error);
    //   }
    // // if($dbmsConnect->query($sqlCreateDataBase)===TRUE){
    // //     echo "database created successfully";
    // // }else{
    // //     echo"fail" . $dbmsConnect->error;
    // // }
    // //creates table

    // if($dbmsConnect->query($sqlCreateTableProduct)===TRUE){
    //     echo"TABLE CREATED";
    // }else{
    //     echo "EPIC FAIL!" . $dbmsConnect->error;
    // }
    // $dbmsConnect->close();
    // echo"hi";


    ?>
    <?php

$msg = ""; 

// check if the user has clicked the button "UPLOAD" 

if (isset($_POST['uploadfile'])) {

    $filename = $_FILES["choosefile"]["name"];

    $tempname = $_FILES["choosefile"]["tmp_name"];  

        $folder = "image/".$filename;   

    // connect with the database

    $db = mysqli_connect("localhost", "root", "", "Image_Upload"); 

        // query to insert the submitted data

        $sql = "INSERT INTO image (filename) VALUES ('$filename')";

        // function to execute above query

        mysqli_query($db, $sql);       

        // Add the image to the "image" folder"

        if (move_uploaded_file($tempname, $folder)) {

            $msg = "Image uploaded successfully";

        }else{

            $msg = "Failed to upload image";

    }

}

$result = mysqli_query($db, "SELECT * FROM image");

?>
</body>
</html>