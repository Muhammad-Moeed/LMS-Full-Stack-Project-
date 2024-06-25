<?php


$con = mysqli_connect("localhost", "root", "", "aptech");
$myquery = mysqli_query($con, "SELECT * FROM video_lectures Where Name = 'fullstack'");

if($myquery){
    echo "<script>
    alert('Video display Successfully')
    </script>";
}

 while($mydata = mysqli_fetch_assoc($myquery)){
 $id = $mydata['id'];
 $name = $mydata ['Name'];
 $video = $mydata['Video'];
?>
    <!-- // Output the video HTML for each row of data -->
     <div class="video">
        <h1>Full Stack Videos:</h1><br>
     <video width="400px" controls >
        <source src= 'lectures/fullstack/<?php echo $video?>' type='video/mp4'>
    </video><br>
    <h2>What is full stack development</h2>
     </div>
  <?php 
  } 
?>
