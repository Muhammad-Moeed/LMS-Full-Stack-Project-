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

    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>


  <div class="wrapper">
        
        <br>
        <form class="p-3 mt-3" method="POST" action="code.php">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="password" name="pass"  placeholder="Enter New Password">
            </div>
<br>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="password" name="cpass"  placeholder="Enter Confirm Password">
            </div>
                       <button class="btn mt-3" type="submit" name="reset_pass">Change Password</button>
        </form> 
    </div>

  

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>