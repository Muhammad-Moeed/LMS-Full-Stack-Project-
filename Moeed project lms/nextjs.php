<?php 
session_start(); // Start the session if needed
$con = mysqli_connect("localhost", "root", "", "join_checking");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$course_name = 'next_js'; // Specify the course name to filter

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>View Record</title>
</head>
<body>

<center><h1 style="background-color: pink;">Next JS Course Students List</h1></center>

<table class="table mt-5 m-4" border="2px">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>CNIC</th>
        <th>Address</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Action</th>
    </tr>

<?php

$query = mysqli_query($con, "SELECT students.*, course.Course_name 
                             FROM students 
                             JOIN course ON students.course_id = course.id 
                             WHERE course.Course_name = '$course_name'");

if (!$query) {
    // Display the SQL error message
    die("SQL Error: " . mysqli_error($con));
}

if (mysqli_num_rows($query) > 0) {
    $sno = 1;
    foreach ($query as $data) {
        ?>
        <tr>
            <td><?php echo $sno ?></td>
            <td><?php echo $data['name']?></td>
            <td><?php echo $data['email']?></td>
            <td><?php echo $data['password']?></td>
            <td><?php echo $data['CNIC']?></td>
            <td><?php echo $data['address']?></td>
            <td><?php echo $data['age']?></td>
            <td><?php echo $data['gender']?></td>
            <!-- delete -->
            <td>
                <button class="btn btn-danger"  
                data-bs-toggle="modal" data-bs-target="#deleteUser_<?php echo $data['id'] ?>">
                Delete</button>
                <button class="btn btn-success" data-bs-toggle="modal" 
                data-bs-target="#editUser_<?php echo $data['id'] ?>">Edit</button>
            </td>
        </tr>

        <!-- Delete Model -->
        <div class="modal fade" id="deleteUser_<?php echo $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <form method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                        <h3>Are you sure you want to delete this data?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                    </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Edit Model -->
        <div class="modal fade" id="editUser_<?php echo $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content"> 
                <form method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">EDIT</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                        <input type="text" class="form-control mb-3" placeholder="Name" name="name" value="<?php echo $data['name'] ?>">
                        <input type="email" class="form-control mb-3" placeholder="Email" name="email" value="<?php echo $data['email'] ?>">
                        <input type="text" class="form-control mb-3" placeholder="Address" name="address" value="<?php echo $data['address'] ?>">
                        <input type="text" class="form-control mb-3" placeholder="Course Name" name="course_name" value="<?php echo $data['course_name'] ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-success">Update</button>
                    </div>
              </form>
            </div>
          </div>
        </div>

        <?php
        $sno++;
    }
} else {
    ?>
    <tr>
        <td colspan="10">Data Not Available Yet!</td>
    </tr>
    <?php 
}
?>

</table>

<?php 
if (isset($_POST['delete'])) {
    $query = mysqli_query($con, "DELETE FROM students WHERE id = '".$_POST['id']."'");

    if ($query) {
        echo "<script>
            alert('Data Deleted Successfully');
            location.assign('fullstack.php');
        </script>";
    }
}

// Update Code
if (isset($_POST["update"])) {
    $query = mysqli_query($con, "UPDATE students 
                                 SET name='".$_POST['name']."', email='".$_POST['email']."', address='".$_POST['address']."', course_name='".$_POST['course_name']."' 
                                 WHERE id = '".$_POST['id']."'");

    if ($query) {
        echo "<script>
            alert('Data Updated Successfully');
            location.assign('fullstack.php');
        </script>";
    }
}
?>

<form>
    <button class="btn btn-primary m-4 mt-2" type="button">
        <a href="tpublic.php?student-list" style="text-decoration: none; color: white; font-weight: bold;">Back</a>
    </button>
</form>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
