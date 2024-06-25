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

    <title>register form</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    
  <div class="bg1">
  <div class="wave"></div>
  <div class="wrapper">
        <!-- <div class="logo">
            <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt="">
        </div> -->
        <div class="text-center mt-4 name">
            Student Registeration Form
        </div>

        <br>


        <!-- msg work -->
        <?php

        if(isset($_SESSION['success'])){
            ?>

            <div class="alert alert-info" role="alert">
            Account created successfully!
            </div>
            <?php
            unset($_SESSION['success']);
        }
        ?>





        <form class="p-3 mt-3" method="post" action="code.php">

            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="name" id="userName" placeholder="Username">
            </div>

            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="userName" placeholder="Email">
            </div>

            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>

            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="text" name="cnic" id="cnic" placeholder="CNIC">
            </div>

            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="text" name="address" id="adress" placeholder="Address">
            </div>

            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="text" name="age" id="age" placeholder="Age">
            </div>

            <div class=" align-items-center">
                <span class="fas fa-key"></span>
                <label for="">Select Gender</label>
                <br>
                <input type="radio" name="gender" value="Male">Male
                <br>
                <input type="radio" name="gender" value="Female">Female
            </div>
            <br>

            <div class="align-items-center">
                <span class="fas fa-key"></span>
                <label for="">Select Course</label>
                <br>
                <select name="courses">
                    <!-- <option disabled selected >List of courses</option>
                    <option value="Fullstack">Fullstack</option>
                    <option value="Advance web development">Advance web development</option>
                    <option value="React js">React js</option>
                    <option value="Advance python programming">Advance python programming</option>
                    <option value="Next js">Next js</option>
                    <option value="Mobile Application Development">Mobile Application Development</option> -->

                    <?php
                     $con=mysqli_connect("localhost","root","","join_checking");
                     $data=mysqli_query($con,"SELECT * FROM course");
                        foreach ($data as $value) {
                        ?>
                            <option value="<?php echo $value['id'] ?>"><?php echo $value['Course_name'] ?></option>
                        <?php
                        }
                        ?>
                </select>
                <!-- <input type="text" name="course_name"  placeholder=""> -->
            </div>
            <br>

            <button class="btn mt-3" name="register" type="submit" style="background-color:#000042";>Register</button>
    </form>
    <br>
        <div class="text-center fs-6">
            <!-- <a href="#">Already Account</a>   -->
            Already Account  <a href="login.php">Login</a>
        </div>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </div> 
  </body>
</html>