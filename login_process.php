<?php 
include ("databaseConnect.php");
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password))
        header("location:login.php?log_msg=All the fields are required");
    else {
        $query = "select * from `authentication` where `username` = '$username' and `password` = '$password'";
        $result = mysqli_query($connection, $query);

        if (!$result)
            header("location:login.php?log_msg=False Credentials");
        else {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $hash_password = $row['password'];

                if (password_verify($password, $hash_password)) {
                    $_SESSION['user'] = $row['id'];
                    header("location:profile.php");
                }
                else
                    header("location:login.php?log_msg=Incorrect Password");
                echo "<span>" . mysqli_num_rows($result) . "</span>";
            }
        }
        
        
        //     else {
        //     $row1 = mysqli_num_rows($result);
        //     $row2 = mysqli_fetch_assoc($result);
        //     $hashed_password = $row2['password'];

        //     if (password_verify($password, $hashed_password))
        //         header("location:login.php?log_msg=You have logged in successfully");
        //     else
        //         header("location:login.php?log_msg=Incorrect Password");

        //         echo $row1;
        // }
    }
}

?>