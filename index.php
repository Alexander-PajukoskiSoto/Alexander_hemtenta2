<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products!</title>
    <!-- Style through php file, because php hates css -->
<?php include "./funktioner/style.php"?>
    <script type='text/javascript'>
// confirm record deletion
function delete_user( id ){
    var answer = confirm('Are you sure?');
    if (answer){
        // if user clicked ok,
        // pass the id to delete.php and execute the delete query
        window.location = './funktioner/delete.php?id=' + id;
    }
}
</script>
</head>
<body>
    <!-- DB CONNECT -->
    <?php include "./funktioner/connect.php"?>
    <?php
        // delete message prompt will be here
        // select all data
        $query = "SELECT id, productName, productDescription, price, productImage FROM productInfo ORDER BY id DESC";
        $stmt = $con->prepare($query);
        $stmt->execute();
        // this is how to get number of rows returned
        $num = $stmt->rowCount();
        // link to create record form
        echo "<a href='./funktioner/create.php'>Create New Product</a>";
        //check if more than 0 record found
        if($num>0){
                //start table
            echo "<table class='table'>";
            //creating our table heading
            echo "<tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>";
            // retrieve our table contents
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    // extract row
    extract($row);
    // creating new table row per record
    echo "<tr>
        <td>{$id}</td>
        <td>{$productName}</td>
        <td>{$productDescription}</td>
        <td>$ {$price}</td>
        <td><img src='./image/$productImage' alt='$productImage' width='150'></img></td>
        <td>";
            // read one record
            echo "<a href='./funktioner/read_one.php?id={$id}'>Read</a>";
            // we will use this links on next part of this post
            echo "<a href='./funktioner/update.php?id={$id}'>Edit</a>";
            // we will use this links on next part of this post
            echo "<a href='#' onclick='delete_user({$id});'>Delete</a>";
        echo "</td>";
    echo "</tr>";
}
            // end table
            echo "</table>";
        }
        // if no records found
        else{
            echo "<div>No records found.</div>";
        }

        
?>
</body>
</html>