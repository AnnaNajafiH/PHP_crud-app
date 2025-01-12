<?php
include "db.php";
if (isset($_POST["add_student"])) {
    $f_name = $_POST["f_name"];
    $l_name = $_POST["l_name"];
    $age = $_POST["age"];

    // Basic Validation
    if (empty($f_name)) {
        header("Location: index.php?message=You need to fill in the first name!");
        exit();
    }

    if (empty($l_name)) {
        header("Location: index.php?message=You need to fill in the last name!");
        exit();
    }

    if (empty($age) || !is_numeric($age) || $age <= 0) {
        header("Location: index.php?message=Please enter a valid age!");
        exit();
    }

else{
        $query = "INSERT INTO students (first_name, last_name, age) VALUES ('$f_name', '$l_name', '$age')";

        $result = mysqli_query($connection, $query);

        if (!$result){
            die ("Query failed". mysqli_error());
        }
        else{
            header("Location: index.php?message=the new student has been added successfully!");
            exit();
        }
        
        
    }
}


?>

