<?php
include ("header.php");
include ("databaseConnect.php");
?>

<div class="box1">
    <h2>ALL STUDENTS</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD STUDENTS</button>
</div>

<table class="table table-hover table-bordered table-striped text-center">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $query = "select * from students";
        $result = mysqli_query($connection, $query);
        if (!$result)
            die("Query Failed" . mysqli_error($connection));
        else {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["first_name"]; ?></td>
                    <td><?php echo $row["last_name"]; ?></td>
                    <td><?php echo $row["age"]; ?></td>
                    <td><a href="update_page1.php?id=<?php echo $row["id"]; ?>" class="btn btn-success">Update</a></td>
                    <td><a href="delete_page.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>
<a href="login.php" class="btn btn-secondary text-white" name="auth_login">Account</a>

<?php

if (isset($_GET['message']))
    echo "<h6>" . $_GET['message'] . "</h6>";

if (isset($_GET['insert_msg']))
    echo "<h6>" . $_GET['insert_msg'] . "</h6>";

if (isset($_GET['update_msg']))
    echo "<h6>" . $_GET['update_msg'] . "</h6>";

if (isset($_GET['delete_msg']))
    echo "<h6>" . $_GET['delete_msg'] . "</h6>";

?>

<!-- Modal -->
<form action="insert.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="lname">last Name</label>
                        <input type="text" name="lname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" name="age" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="add_students">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php include ("footer.php"); ?>