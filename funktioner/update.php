<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
      <!-- container -->
      <div>
        <div>
            <h1>Update Product</h1>
        </div>
        <?php
        // get passed parameter value, in this case, the record ID
        $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
        //include database connection
        include './connect.php';
        // read current record's data
        try {
            // prepare select query
            $query = "SELECT id, productName, productDescription, price FROM productInfo WHERE id = ? LIMIT 0,1";
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
        }
        // show error
        catch(PDOException $exception){
            die('ERROR: ' . $exception->getMessage());
        }
?>
       <?php
// check if form was submitted
if($_POST){
    try{
        // write update query
        // in this case, it seemed like we have so many fields to pass and
        // it is better to label them and not use question marks
        $query = "UPDATE productInfo
                    SET productName=:productName, productDescription=:productDescription, price=:price, productImage=:productImage
                    WHERE id = :id";
        // prepare query for excecution
        $stmt = $con->prepare($query);
        // posted values
        $productName=htmlspecialchars(strip_tags($_POST['productName']));
        $productDescription=htmlspecialchars(strip_tags($_POST['productDescription']));
        $price=htmlspecialchars(strip_tags($_POST['price']));
        $productImage=$_FILES['productImage']['name'];

        //move file
        move_uploaded_file($_FILES['productImage']['tmp_name'],"../image/$productImage");

        // bind the parameters
        $stmt->bindParam(':productName', $productName);
        $stmt->bindParam(':productDescription', $productDescription);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':productImage', $productImage);
        // Execute the query
        if($stmt->execute()){
            echo "<div>Record was updated.</div>";
        }else{
            echo "<div>Unable to update record. Please try again.</div>";
        }
    }
    // show errors
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
<!--we have our html form here where new record information can be updated-->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Name</td>
            <td><input type='text' name='productName' value="<?php echo htmlspecialchars($productName, ENT_QUOTES);  ?>" /></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='productDescription' ><?php echo htmlspecialchars($productDescription, ENT_QUOTES);  ?></textarea></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type='text' name='price' value="<?php echo htmlspecialchars($price, ENT_QUOTES);  ?>"  /></td>
        </tr><tr>
            <td>Image</td>
            <td>  <input type="file" name="productImage" value="" /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save Changes' />
                <a href='../index.php'>Back to read products</a>
            </td>
        </tr>
    </table>
</form>
    </div> <!-- end .container -->
</body>
</html>