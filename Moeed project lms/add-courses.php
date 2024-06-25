<style>

    .main{
        margin-left: 300px;
    }
</style>


<div class="container mt-5">
    <div class="row">
        <div class="col-12">
           
                <div class="card-title">
                    <a href="" class="btn btn-primary btn-sm m-3" data-bs-toggle="modal" data-bs-target="#addCategory">ADD COURSES</a>
                </div>
            </div>
        </div>
</div>




<!-- Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD Courses</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control mb-3" name="c_name" placeholder="Course Name">

                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="addc_name" class="btn btn-primary">Add Courses</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if(isset($_POST['addc_name'])){
    $c_name = $_POST['c_name'];

    $conn = mysqli_connect("localhost", "root", "", "join_checking");

    $query = mysqli_query($conn, "INSERT INTO course (Course_name) VALUES ('$c_name')");

    if($query){
        echo "<script>
        alert('course Name uploaded successfully')
        location.assign('tpublic.php?add-courses')
        </script>";
    }
}
?>