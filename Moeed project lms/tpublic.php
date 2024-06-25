<?php
include "code.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <title>taecher dashboard</title>
  </head>
  <body>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="webstyle.css">
   
<header>
<h3 style="margin-top: 10px;">Welcome to Teacher Dashboard</h3>
  
  <div class="icon">
    <i class="fa-solid fa-xmark" id="icon1"  onclick="show()"></i>
    <!-- <i class="fa-solid fa-xmark" id="icon2"></i> -->
  </div>
  <!-- <button class="btn btn-dark btn-sm" id="btn">Logout</button> -->


</header>
<!-- Side navigation bar start -->
        <div class="tsidebar" id="side">
            <div class="tmenu">
            <ul>
                    <li><a href="tpublic.php?student-list">Enrolled Student List</a></li>
                    <li><a href="tpublic.php?add-courses">ADD Courses</a></li>
                    <li><a href="tpublic.php?add-videos">ADD Video Lectures</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>

        <div class="main">
           
        <?php
            if (isset($_GET['student-list'])) {
                include "student-list.php";
            }


            if (isset($_GET['add-courses'])) {
                include "add-courses.php";
            }

            if (isset($_GET['add-videos'])) {
              include "add-videos.php";
          }


            ?>

        </div>
   

  </body>
</html>

<script>
  var show1 =document.getElementById("side");
  icon = document.getElementById('icon1')
  var display = 0;

  function show(){
    if(display == 1){
      show1.style.display = 'block';
      icon. classList = "fa-solid fa-xmark";

      display = 0;
    }
    else{
      show1.style.display = 'none';
      icon. classList = "fa-solid fa-bars";
      display = 1;
      

    }

  }
 

</script>
