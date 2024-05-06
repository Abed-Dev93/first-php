<?php
include ("header.php");
include ("databaseConnect.php");

if (isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeat = $_POST['repeat'];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    if (empty($fullname) || empty($username) || empty($password) || empty($repeat))
        header("location:register.php?reg_msg=All the fields are required");
    else if ($password != $repeat)
        header("location:register.php?reg_msg=Password does not match, try again");
    else {
        $query = "insert into `authentication` (`full_name`, `username`, `password`) values ('$fullname', '$username', '$hashed_password')";
        $result = mysqli_query($connection, $query);

        if (!$result)
            die("Query Failed" . mysqli_error($connection));
        else
            header("location:register.php?reg_msg=New Account has been created successfully");
    }
}

?>

<form class="form" method="post">
    <div class="form-group mb-2">
        <label for="fullname">Full Name</label>
        <input type="text" name="fullname" class="form-control">
    </div>
    <div class="form-group mb-2">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control">
    </div>
    <div class="form-group mb-2">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group mb-2">
        <label for="repeat">Repeat-passwprd</label>
        <input type="password" name="repeat" class="form-control">
    </div>
    <button type="submit" class="btn btn-success" name="register">Register</button>
    <?php 
        if (isset($_GET['reg_msg']))
            echo "<h6>" . $_GET['reg_msg'] . "</h6>";
    ?>
</form>


<?php include ("footer.php"); ?>