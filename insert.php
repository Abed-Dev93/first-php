<?php 

    include("databaseConnect.php");

    if (isset($_POST["add_students"])) {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $age = $_POST["age"];

        if (empty($fname) || empty($lname) || empty($age))
            header("location:index.php?message=You need to fill all the fields!");
        else {
            $query = "insert into `students` (`first_name`, `last_name`, `age`) values ('$fname', '$lname', '$age')";
            $result = mysqli_query($connection, $query);

            if (!$result)
                die("Query Failed! " . mysqli_error($connection));
            else 
                header("location:index.php?insert_msg=Your data has been added successfully");
        }
    }

?>