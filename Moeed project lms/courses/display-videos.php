<?php

session_start();
$con = mysqli_connect("localhost", "root", "", "join_checking");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Assuming 'student' session variable stores student ID
$student_id = $_SESSION['student'];

// SQL query to get videos for the courses the student is registered in
$myquery = mysqli_query($con, "
    SELECT video_lectures.id, video_lectures.description, video_lectures.Videos, course.Course_name
    FROM video_lectures
    JOIN course ON video_lectures.course_id = course.id
    JOIN students ON students.course_id = course.id
    WHERE students.id = '$student_id'
");

if (!$myquery) {
    die("SQL Error: " . mysqli_error($con));
}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Student Course Videos</title>
</head>
<body>

<h1 style="text-align: center; background-color: yellow">Course Videos:</h1>
<div class="container">
    <div class="row">
        <?php while ($mydata = mysqli_fetch_assoc($myquery)) { ?>
            <div class="col-12 mt-5 mb-5">
                <div class="card" style="width: 18rem; margin: 50px;">
                    <div class="video">
                        <video id="video_<?php echo $mydata['id']; ?>" src="../lectures/<?php echo $mydata['Videos']; ?>" type="video/mp4" width="800px" controls></video>
                        <div class="description">Title: <?php echo $mydata['description']; ?></div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var videos = document.querySelectorAll('video');

        videos.forEach(function(video, index) {
            video.addEventListener('ended', function() {
                if (index < videos.length - 1) {
                    videos[index + 1].play();
                }
            });
        });
    });
</script>

</body>
</html>
