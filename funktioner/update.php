<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
      <!-- container -->
      <div class="container">
        <div class="page-header">
            <h1>Update Product</h1>
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
        <!-- PHP post to update record will be here -->
<!--we have our html form here where new record information can be updated-->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table>
        <tr>
            <td>Name</td>
            <td><input type='text' name='productName' value="<?php echo htmlspecialchars($productName, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='productDescription' class='form-control'><?php echo htmlspecialchars($productDescription, ENT_QUOTES);  ?></textarea></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type='text' name='price' value="<?php echo htmlspecialchars($price, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save Changes' class='btn btn-primary' />
                <a href='../index.php' class='btn btn-danger'>Back to read products</a>
            </td>
        </tr>
    </table>
</form>
    </div> <!-- end .container -->
</body>
</html>