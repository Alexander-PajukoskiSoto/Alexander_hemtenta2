<?php
// include database connection
include './connect.php';
try {
    // get record ID
    $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
    // delete query
    $query = "DELETE FROM productInfo WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bindParam(1, $id);
    if($stmt->execute()){
        // redirect to read records page and
        // tell the user record was deleted
        header('Location: ../index.php?action=deleted');
    }else{
        //if doesn't work
        die('Unable to delete record.');
    }
}
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
