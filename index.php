<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud_app</title>
</head>
<body>
    <?php
    //define servername user password and name of database
    $serverName = "localhost";
    $dbmsUser = "root";
    $dbmsPassword = "";
    $dbName = "crud_app";

    $dbms_connect = mysqli_conntect($serverName,$dbmsUser,$dbmsPassword,$dbName);

    $sqlCreateTableProduct = "CREATE TABLE product(productID INT PRIMARY KEY, productName VARCHAR, price INT, productImage IMAGE)";
    //connected
    if (!$dbms_connect){
        echo "hlep";
    }
    ?>
</body>
</html>