<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<?php include "./style.php"?>

</head>
<body>
       <!-- container -->
       <div>
        <div>
            <h1>Read Product</h1>
        </div>
        <?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
//include database connection
include './connect.php';
// read current record's data
try {
    // prepare select query
    $query = "SELECT * FROM productInfo WHERE id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
    // this is the first question mark
    $stmt->bindParam(1, $id);
    // execute our query
    $stmt->execute();
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // values to fill up our form
    $productName = $row['productName'];
    $productDescription = $row['productDescription'];
    $price = $row['price'];
    $productImage = $row['productImage'];
    $productImageImg = "<img src='../image/$productImage' width='150'>";
}
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
        <!--we have our html table here where the record will be displayed-->
<table class='table'>
    <tr>
        <td>Name</td>
        <td><?php echo htmlspecialchars($productName, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Description</td>
        <td><?php echo htmlspecialchars($productDescription, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Price</td>
        <td><?php echo htmlspecialchars("$ ".$price, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Image</td>
        <td><?php echo ($productImageImg);  ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <a href='../index.php'>Back to read products</a>
        </td>
    </tr>
</table>
    </div> <!-- end .container -->
</body>
</html>