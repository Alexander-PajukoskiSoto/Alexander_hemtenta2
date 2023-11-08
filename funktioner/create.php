<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
<?php

?>
<?php

    include './connect.php';
if($_POST){
    // include database connection
    try{
        // insert query
        $query = "INSERT INTO productInfo SET productName=:productName, productDescription=:productDescription, price=:price, productImage=:productImage, created=:created";
        // prepare query for execution
        $stmt = $con->prepare($query);
        // posted values
        $name=htmlspecialchars(strip_tags($_POST['productName']));
        $description=htmlspecialchars(strip_tags($_POST['productDescription']));
        $price=htmlspecialchars(strip_tags($_POST['price']));
        $productImage=$_FILES['productImage']['name'];
        move_uploaded_file($_FILES['productImage']['tmp_name'],"../image/$productImage");
        // bind the parameters
        $stmt->bindParam(':productName', $name);
        $stmt->bindParam(':productDescription', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':productImage', $productImage);
        // specify when this record was inserted to the database
        $created=date('Y-m-d H:i:s');
        $stmt->bindParam(':created', $created);
        // Execute the query
        if($stmt->execute()){
            echo "<div>Record was saved.</div>";
        }else{
            echo "<div>Unable to save record.</div>";
        }
        
    }
    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
<!-- html form here where the product information will be entered -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Name</td>
            <td><input type='text' name='productName'/></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='productDescription'></textarea></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type='text' name='price'/></td>
        </tr>
        <tr>
            <td>Image</td>
            <td>  <input type="file" name="productImage" value="" /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' />
                <a href='../index.php'>Back to read products</a>
            </td>
        </tr>
        
    </table>
</form>

</body>
</html>