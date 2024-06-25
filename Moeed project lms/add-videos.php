<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add Videos</title>
<style>
  .main{
    align-items: center;
    margin-left: 200px;
 }
</style>
  
  </head>
  <body >
<div class="container">
<div class="row mt-5">
  <div class="col-12">
  

        <!-- 1st div full stack-->
 <center><div class="card" style="width: 18rem;margin:50px;display:flex">

  <div class="card-body">
    <h5 class="card-title" style="background-color: yellow;">Upload Videos</h5>
</div>


<!--Video uploading start-->

<form method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Enter Video Title"  class="form-control mb-3 mt-3">

        <input type="text" name="descript" placeholder="Enter Video description"  class="form-control mb-3 mt-3">
        
        <select name="course" class="form-control mb-3" >
        <option value="">Select Course</option>
          
      
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
       
        <input   class="form-control" name="video" type="text" onclick="this.type= 'file'" 
        placeholder="upload video">
        <button type="submit" name="upload" class="btn btn-success mt-3 mb-3">Submit</button>
        </form>


</div>

<?php
if(isset($_POST['upload'])){
 

  $con = mysqli_connect("localhost", "root", "", "join_checking");

  $name = $_POST['name'];
  $descript = $_POST['descript'];
  $cid = $_POST['course'];
  $file_name = $_FILES['video']['name'];
  $file_size = $_FILES['video']['size'];
  $tmp_name = $_FILES['video']['tmp_name'];
  $file_type = pathinfo($file_name,PATHINFO_EXTENSION);

  $destination = "lectures/".$file_name;
  
        
    //Type must be mp4
    if($file_type == 'mp4'){
        
        // File Move
        if(move_uploaded_file($tmp_name,$destination)){
            //Query

            $query =  mysqli_query($con,"INSERT INTO video_lectures (Name,description, course_id, Videos)
            VALUES('$name', '$descript', '$cid','$file_name')");
               if($query){
                    echo "<script>
                        alert('Video Inserted Successfully')
                        location.assign('tpublic.php?/add-videos')
                    </script>";
                }

        }else{
            echo "<script>
     alert('Video Not Uploaded')
</script>";
        }
    }else{
        echo "<script>
     alert('Upload Only mp4 video')
</script>";
    }

}
?>


<!-- Uploading Video end -->

   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</center>
  
</body>
</html>