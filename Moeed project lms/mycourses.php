<?php
// session_start(); // Start the session to access session variables
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="webstyle.css">

    <title>My Courses</title>
</head>
<body>

<div class="courses">
    <ul>
    <?php
    $con = mysqli_connect("localhost", "root", "", "join_checking");
    
    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Ensure the student session ID is set
    if (isset($_SESSION['student'])) {
        $student_id = $_SESSION['student'];

        // SQL query to fetch courses for the logged-in student
        $query = mysqli_query($con, "SELECT c.id, c.Course_name
                                     FROM course c
                                     JOIN students s ON s.course_id = c.id
                                     WHERE s.id = '$student_id'");

        if (mysqli_num_rows($query) > 0) {
            foreach ($query as $data) {
                ?>
                <li><a href="courses/display-videos.php?course_id=<?php echo $data['id'] ?>"><?php echo $data['Course_name'] ?></a></li>
                
                <?php

            }
        } else {
            echo "<li>No courses found for this student.</li>";
        }
    } else {
        echo "<li>Student ID is not set in the session.</li>";
    }

    mysqli_close($con); // Close the database connection
    ?>
    </ul>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>
