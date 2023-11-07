<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products!</title>
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
        $action = isset($_GET['action']) ? $_GET['action'] : "";
        // if it was redirected from delete.php
        if($action=='deleted'){
            echo "<div>Record was deleted.</div>";
        }
        // select all data
        $query = "SELECT id, productName, productDescription, price FROM productInfo ORDER BY id DESC";
        $stmt = $con->prepare($query);
        $stmt->execute();
        // this is how to get number of rows returned
        $num = $stmt->rowCount();
        // link to create record form
        echo "<a href='./funktioner/create.php'>Create New Product</a>";
        //check if more than 0 record found
        if($num>0){
                //start table
            echo "<table>";
            //creating our table heading
            echo "<tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
            </tr>";
            // retrieve our table contents
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    // extract row
    // this will make $row['firstname'] to
    // just $firstname only
    extract($row);
    // creating new table row per record
    echo "<tr>
        <td>{$id}</td>
        <td>{$productName}</td>
        <td>{$productDescription}</td>
        <td>$ {$price}</td>
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