<?php 
include ("databaseConnect.php");
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password))
        header("location:login.php?log_msg=All the fields are required");
    else {
        $query = "select * from `authentication` where `username` = '$username'";
        $result = mysqli_query($connection, $query);

        if (!$result)
            header("location:login.php?log_msg=False Credentials");
        else {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $hash_password = $row['password'];

                if (password_verify($password, $hash_password)) {
                    $_SESSION['user'] = $row['id'];
                    $hash_id = password_hash($_SESSION['user'], PASSWORD_DEFAULT);
                    header("location:profile.php?u=" . $hash_id);
                }
                else
                    header("location:login.php?log_msg=False Credentials");
            }
        }
    }
}

?>