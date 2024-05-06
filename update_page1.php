<?php
include ("header.php");
include ("databaseConnect.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "select * from students where `id` = '$id'";
        $result = mysqli_query($connection, $query);
        if (!$result)
            die("Query Failed" . mysqli_error());
        else
            $row = mysqli_fetch_assoc($result);
}

    if (isset($_POST['update_student'])) {

        if (isset($_GET['id_new']))
            $id_new = $_GET['id_new'];
      
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $age = $_POST['age'];

        $query = "update `students` set `first_name` = `$fname`, `last_name` = `$lname`, `age` = `$age` where `id` = `$id_new`";
        $result = mysqli_query($connection, $result);

        if (!$result)
            die("Query Failed" . mysqli_error());
        else
            header("location:index.php?update_msg=You have successfully update the data");
    }

?>

<form action="update_page1.php?id_new=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="fname">First Name</label>
        <input type="text" name="fname" class="form-control" value="<?php echo $row['first_name']; ?>">
    </div>
    <div class="form-group">
        <label for="lname">last Name</label>
        <input type="text" name="lname" class="form-control" value="<?php echo $row['last_name']; ?>">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="text" name="age" class="form-control" value="<?php echo $row['age']; ?>">
    </div>
    <button type="submit" class="btn btn-success" name="update_student">Update</button>
    <?php echo $id_new; ?>
</form>



<?php include ("footer.php"); ?>