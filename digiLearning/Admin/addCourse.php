<?php 
    if(!isset($_SESSION)){
        session_start();
    }
        include('../Admin/admininclude/header.php');
        include('../dbConnection.php');
    
        if(isset($_SESSION['is_admin_login'])){
            $adminEmail= $_SESSION['adminLogEmail'];
        }else{
            echo "Unabale to Go Through!";
        }

    if(isset($_REQUEST['courseSubmitBtn'])){
        //Cheaking for Empty Fields
        if(($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "") ||
        ($_REQUEST['course_duration'] == "") ||($_REQUEST['course_price'] == "") ||($_REQUEST['course_original_price'] == "")){
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields are Reqired!..</div>';
        }else{
            $course_name = $_REQUEST['course_name'];
            $course_desc = $_REQUEST['course_desc'];
            $course_author = $_REQUEST['course_author'];
            $course_duration = $_REQUEST['course_duration'];
            $course_price = $_REQUEST['course_price'];
            $course_original_price = $_REQUEST['course_original_price'];
            $course_image = $_FILES['course_img']['name'];
            $course_image_temp = $_FILES['course_img']['tmp_name'];
            $img_folder = '../image/courseimg/'.$course_image;
            move_uploaded_file($course_image_temp,$img_folder);

            $sql ="INSERT INTO course (course_name,course_desc,course_author,course_img,course_duration,course_price,course_original_price)
            VALUES ('$course_name','$course_desc','$course_author','$img_folder','$course_duration','$course_price','$course_original_price')";

            if($conn->query($sql) == TRUE){
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Added Successfully...</div>';
            }else{
                $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to Add Course!..</div>';
            }
        }
    }
 ?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Course <i class="fa-solid fa-puzzle-piece"></i></h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_name"><i class="fa-brands fa-discourse"></i> Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name">
        </div>
        <div class="form-group">
            <label for="course_desc"><i class="fa-solid fa-file"></i> Course Description</label>
            <textarea class="form-control" id="course_desc" name="course_desc" row=2></textarea>
        </div>
        <div class="form-group">
            <label for="course_author"><i class="fa-solid fa-signature"></i> Author</label>
            <input type="text" class="form-control" id="course_author" name="course_author">
        </div>
        <div class="form-group">
            <label for="course_duration"><i class="fa-solid fa-clock"></i> Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration">
        </div>
        <div class="form-group">
            <label for="course_original_price"><i class="fa-solid fa-money-bill"></i> Course Original Price</label>
            <input type="text" class="form-control" id="course_original_price" name="course_original_price">
        </div>
        <div class="form-group">
            <label for="course_selling_price"><i class="fa-solid fa-money-bill"></i> Course Selling Price</label>
            <input type="text" class="form-control" id="course_price" name="course_price">
        </div>
        <div class="form-group">
            <label for="course_img"><i class="fa-solid fa-images"></i> Course Image</label>
            <input type="file" class="form-control-file" id="course_img" name="course_img">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
        <?php 
           if(isset($msg)) {echo $msg;}
        ?>
    </form>
</div>

</div><!--div row close from header-->
</div><!--div container-fluid close from header-->

<?php 
    include('../Admin/admininclude/footer.php');
 ?>