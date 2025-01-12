<?php include("header.php"); ?>
<?php include("db.php"); ?>


<!-- Fetch Existing Student Data. -->
<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $query = "SELECT * FROM students WHERE id = $id";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die ("Query failed". mysqli_error( $connection));
        }
        else {
            $row = mysqli_fetch_assoc($result);
        }
    }
    else {
        header("Location: index.php");
    }
?>

<!-- Handling the Update Form Submission -->
<?php 
if (isset($_POST["update_student"])) {

    if (isset($_GET["id_new"])) {
        $id_new = $_GET["id_new"];
    }
    $f_name = $_POST["f_name"];
    $l_name = $_POST["l_name"];
    $age = $_POST["age"];
    $query = "UPDATE students SET first_name = '$f_name', last_name = '$l_name', age = $age WHERE id = $id_new";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die ("Query failed". mysqli_error( $connection));
    }
    else {
        header("Location: index.php?update_msg= you have updated the data successfully");
    }
}
?>


    <form action="update_page.php?id_new=<?php echo $id; ?>" method="post" class="container">
        <div class="form-group">
            <label for="f_name">First Name:</label>
            <input type="text" name="f_name" class="form-control" value="<?php echo $row["first_name"]?>">
        </div>
        <div class="form-group">
            <label for="l_name">Last Name:</label>
            <input type="text" name="l_name" class="form-control" value="<?php echo $row["last_name"] ?>">
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
             <input type="number" name="age" class="form-control" value="<?php echo $row["age"] ?>">
        </div>
         <input type="submit" class="btn btn-success" name="update_student" value="Update">

    </form>



<?php include("footer.php"); ?>