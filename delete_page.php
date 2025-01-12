<?php include("db.php"); ?>

<?php 
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    }
    else {
        header("Location: index.php");
    }
    $query = "DELETE FROM students WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die ("Query failed". mysqli_error( $connection));
    }
    else {
        header("Location: index.php?delete_msg= you have deleted the data successfully");
    }
?>
