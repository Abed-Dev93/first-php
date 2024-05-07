<?php 
    include("databaseConnect.php");
    include("header.php");
    session_start();

    if (!isset($_GET['u']))
        header("location:login.php?log_msg=Invalid URL");

    if (!isset($_SESSION['user']))
        header("location:login.php?log_msg=Error in logging in");
    else {
        $userId = $_SESSION['user'];
        $hashed_id = $_GET['u'];
        if (password_verify($userId, $hashed_id)) {
            $query = "select * from `authentication` where `id` = '$userId'";
            $result = mysqli_query($connection, $query);
            if (!$result)
                die("Not Authenticated" . mysqli_error($connection));
            else {
                $row = mysqli_fetch_assoc($result);
                echo "Full Name: " . $row['full_name'] . " has a unique username " . $row['username'];
            }
        }
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header("location:login.php?log_msg=You have logged out successfully");
    }
?>

<br><br><br>

<form action="login.php" method="post">
    <button type="submit" class="btn btn-danger" name="logout">Logout</button>
</form>

<script>
    $(document).ready(function() {
            $(".logoutForm").addClass("animated shake");
        });
</script>

<?php include ("footer.php"); ?>