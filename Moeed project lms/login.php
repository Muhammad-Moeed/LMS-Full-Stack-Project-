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
    <link rel="stylesheet" href="webstyle.css">
  </head>
  <body>

  <div class="bg1">
  <div class="wave"></div>
  <div class="wrapper">
        <!-- <div class="logo">
            <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt="">
        </div> -->
        <div class="text-center mt-4 name">
            Login Form
        </div>
        <br>
        <form class="p-3 mt-3" method="POST" action="code.php">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="userName" placeholder="Email">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <button class="btn mt-3" type="submit" name="login">Login</button>
        </form>
        <br>
        <div class="text-center fs-6">
            <!-- <a href="#">Create Account?</a> or  -->
            Create Account? <a href="forget_password.php">Forget Password</a>
            <!-- <a href="register.php">Sign up</a> -->
            <button type ="button" name="student" class="btn btn-danger mt-4" style="background-color: green;">
            <a href="student.php" style=" color:white;">Student</a></button>
            <button type ="button" name="student" class="btn btn-danger mt-4     mybtn" style="background-color: blue;">
                <a href="teacherform.php" style=" color:white;">Teacher</a></button>
        </div>
    </div>
</div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>