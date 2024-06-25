<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

// Database Connection

$con=mysqli_connect("localhost","root","","join_checking");

session_start();

// registeration form student code




if(isset($_POST['register'])){
    

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cnic = $_POST['cnic'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $course = $_POST['courses']; // Assuming this is the course ID
    $role = 'student';

    // Check if the course ID exists
    $course_check = mysqli_query($con, "SELECT id FROM course WHERE id = '$course'");
    if(mysqli_num_rows($course_check) == 0){
        echo "<script>
        alert('The selected course does not exist');
        location.assign('student.php');
        </script>";
        exit();
    }

    $data = mysqli_query($con, "SELECT * FROM students WHERE email = '$email'");

    if(mysqli_num_rows($data) > 0){
        echo "<script>
        alert('This email already exists');
        location.assign('student.php');
        </script>";
    } else {
        $query = mysqli_query($con, "INSERT INTO students(name, email, password, CNIC, address, age, gender, course_id, role) VALUES ('$name', '$email', '$password', '$cnic', '$address', '$age', '$gender', '$course', '$role')");

        if($query){
            // echo "<script>
            // alert('Your account was created successfully');
            // location.assign('login.php');
            // </script>";

            $_SESSION['success'] = 'Account created successfully';
            header('location:student.php');
            exit(); // Ensure no further code is executed
        } else {
            echo "Error: " . mysqli_error($con); // Display the error
        }
    }

    mysqli_close($con); // Close the database connection
}



// registeration form teacher code

if(isset($_POST['teacher'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cnic=$_POST['cnic'];
    $address=$_POST['address'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $role='Teacher';



    $data2=mysqli_query($con,"SELECT * FROM teacher WHERE email = '$email'");

    if(mysqli_num_rows($data2) > 0){
        echo "<script>
        alert('This email is already exists')
        location.assign('teacherform.php')
        </script>";
    }
    else{

        $query2=mysqli_query($con,"INSERT INTO teacher
        (name,email,password,CNIC,address,age,gender,role)VALUES 
        ('$name','$email','$password','$cnic','$address','$age','$gender','$role')");
    }

    if($query2){
        // echo "<script>
        // alert('Your account created successfully')
        // location.assign('register.php')
        // </script>";
        $_SESSION['success1']='Account created successfully';
        header('location:teacherform.php');
    }
}



// Login form

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password= $_POST['password'];

 $std_query = mysqli_query($con, "SELECT * FROM students 
 WHERE email = '$email' && password = '$password'");

if(mysqli_num_rows($std_query) > 0){

    
    $new = mysqli_fetch_assoc($std_query);

     $_SESSION['student'] = $new['id'];
     echo "<script>location.assign('public.php')</script>";
 }

else{
        $teacher_query = mysqli_query($con, "SELECT * FROM teacher 
        WHERE email = '$email' && password = '$password'");
        
        $check_data = mysqli_num_rows($teacher_query);

        if($check_data > 0){

            // $std_show=mysqli_query($con,"SELECT * FROM students WHERE course_name = 'Fullstack'")
            // $show = mysqli_fetch_assoc($std_show);

            // if($show['status'] == "verified"){
            //     // echo "Verified";
            //     if($data['role'] == "super admin"){
            //         echo "Super Admin";
            //     }else if($data['role'] == "admin"){
            //         echo "Admin";
            //     }else{
            //         echo "User";
            //     }
            // }else{
            //     echo "Unverified Account";
            // }
            echo "<script>location.assign('tpublic.php')</script>";
            //  echo "connected";

        }
        else{
            echo "<script>
            alert ('Email or Password is not match')
            location.assign('login.php')

            </script>";
        }
        

    }
    
    



}


//Forget Password 
if (isset($_POST['forget_password'])) {
    $email = $_POST['email'];
    $randnum = rand(1, 9999999);
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'm.moeedq497@gmail.com';                     //SMTP username
        $mail->Password   = 'xvdgnvmpmxtcbita';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('m.moeedq497@gmail.com', 'Moeed');
        $mail->addAddress($email, $email);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Reset Password Verification";
        $mail->Body    = "<h1>Reset Password Code <b>" . $randnum . "</b></h1>";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        mysqli_query($con, "INSERT INTO forget_password(Code,Email)VALUES('$randnum','$email')");
        

        echo '<script>
            alert("Code Has Been Sent To Mail")
            location.assign("codeVerification.php")
        </script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Code Verification
if(isset($_POST['code_verification'])){
    $code = $_POST['code'];
   $mQuery = mysqli_query($con, "SELECT * FROM forget_password WHERE Code = '$code'");
    $data = mysqli_fetch_assoc($mQuery);

    // $_SESSION['email'] = $data['email'];

    if($mQuery){
        
        echo '<script>
            alert("Code Verified")
            location.assign("resetPassword.php")
        </script>';
    }else{
        echo '<script>
        alert("Code Verified failed")
        location.assign("codeVerification.php")
    </script>';
    }

}


// Reset Password

if(isset($_POST['reset_pass'])){
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $email = $_SESSION['email'];

    if($pass == $cpass){
        $pquery =  mysqli_query($con, "UPDATE students SET password = '$pass ' WHERE email = '".$_SESSION['email']."'");
        if($pquery){
         
            // mysqli_query($con, "DELETE FROM forgepassword WHERE email = '$email'");
            // unset($_SESSION['email']);
           echo "<script>
           alert('Your Password Has Changed successfully')
           location.assign('login.php')
       </script>";
        

    }
}else{
    echo "<script>
    alert('Confirm Password not match')
    location.assign('resetPassword.php')
</script>";
}
}
?>