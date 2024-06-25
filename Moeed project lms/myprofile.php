<?php

if(!isset($_SESSION['student'])){
    // header('location:index.php');
    echo "<script>
      alert('Please Login First')
      location.assign('index.php')
    </script>";
}


    $con = mysqli_connect("localhost", "root", "", "join_checking");

    $myQuery = mysqli_query($con, "SELECT * FROM students WHERE id = '".$_SESSION['student']."'");

    ?>
    <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>My Profile</title>
  </head>
  <body>
   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="webstyle.css">

    <div class="container">
        <div class="row">
            <div class="col-12">
    <table class="table mt-5" border='2' id="table">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>CNIC</th>
            <th>Adress</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Action</th>

            
        </tr>

        <?php


  
  
  $mydata = mysqli_fetch_assoc($myQuery);


  
  
    ?>


    <tr>
        <td><?php echo $mydata['name']?></td>
        <td><?php echo $mydata['email']?></td>
        <td><?php echo $mydata['password']?></td>
        <td><?php echo $mydata['CNIC']?></td>
        <td><?php echo $mydata['address']?></td>
        <td><?php echo $mydata['age']?></td>
        <td><?php echo $mydata['gender']?></td>

        <td>
        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#editUser_<?php echo $mydata['id'] ?>">Edit</button>
                    
        </td>
        
        <!-- Edit Modal -->

        <div class="modal fade" id="editUser_<?php echo $mydata['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form method="post">
            <div class="modal-header">
                
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        
                <div class="modal-body">
                <input type="hidden" name="id" value="<?php echo $mydata['id'] ?>">
                            
                <input type="text" class="form-control mb-3" placeholder="Name" name="name" value="<?php echo $mydata['name'] ?>">

                 <input type="email" class="form-control mb-3" placeholder="Email" name="email" value="<?php echo $mydata['email'] ?>">
                 
                  <input type="text" class="form-control mb-3" placeholder="Password" name="password" value="<?php echo $mydata['password'] ?>">

                   <input type="text" class="form-control mb-3" placeholder="Address" name="address" value="<?php echo $mydata['address'] ?>">
            </div>
            
        
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="hidden" name="id" value="<?php echo $mydata['id']?>">
                <button type="submit" name="update" class="btn btn-success">Update</button>
            </div>
      </form>
    </div>
  </div>
</div>
        
    

        
    </tr>
  
    <?php

?>

    </table>
    </div>
    </div>
</div>

  </body>
</html>
<?php

// Update Code

if(isset($_POST['update'])){
                
    // $name = "abc";
    // $name = "Updated";

    $MYquery = mysqli_query($con,"UPDATE students SET name='".$_POST['name']."',email='".$_POST['email']."',password='".$_POST['password']."',address='".$_POST['address']."'     WHERE id = '".$_POST['id']."'");


    if($MYquery){
        echo "<script>
            alert('Data Updated Successfully')
        </script";
}
else{
    echo "<script>
            alert('no Update')
        </script";

}

}


?>