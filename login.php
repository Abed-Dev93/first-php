<?php
include ("header.php");
?>

<form action="login_process.php" method="post">
    <div class="form-group mb-2">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control">
    </div>
    <div class="form-group mb-2">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-success" name="login">Login</button>
    <p class="mt-4">Don't have an account? <a href="register.php">Register</a>
</form>

<?php 
    if (isset($_GET['log_msg']))
        echo "<h6>" . $_GET['log_msg'] . "</h6>";
?>


<?php include ("footer.php"); ?>