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

    if(isset($_REQUEST['studentSubmitBtn'])){
        //Cheaking for Empty Fields
        if(($_REQUEST['Stu_name'] == "") || ($_REQUEST['Stu_email'] == "") || ($_REQUEST['Stu_pass'] == "") ||
        ($_REQUEST['Stu_occ'] == "")){
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields are Reqired!..</div>';
        }else{
            $Stu_name = $_REQUEST['Stu_name'];
            $Stu_email = $_REQUEST['Stu_email'];
            $Stu_pass = $_REQUEST['Stu_pass'];
            $Stu_occ = $_REQUEST['Stu_occ'];
            $sql ="INSERT INTO student (Stu_name,Stu_email,Stu_pass,Stu_occ)
            VALUES ('$Stu_name','$Stu_email','$Stu_pass','$Stu_occ')";

            if($conn->query($sql) == TRUE){
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Student Added Successfully...</div>';
            }else{
                $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to Add Course!..</div>';
            }
        }
    }
 ?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Student <i class="fa-solid fa-user-plus"></i></h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="Stu_name"><i class="fa-solid fa-user"></i>Student Name</label>
            <input type="text" class="form-control" id="Stu_name" name="Stu_name">
        </div>
        <div class="form-group">
            <label for="Stu_email"><i class="fa-solid fa-envelope"></i>Student Email</label>
            <input type="text" class="form-control" id="Stu_email" name="Stu_email" row=2>
        </div>
        <div class="form-group">
            <label for="Stu_pass"><i class="fa-solid fa-key"></i>Password</label>
            <input type="text" class="form-control" id="Stu_pass" name="Stu_pass">
        </div>
        <div class="form-group">
            <label for="Stu_occ"><i class="fa-brands fa-squarespace"></i>Student Occupation</label>
            <input type="text" class="form-control" id="Stu_occ" name="Stu_occ">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="studentSubmitBtn" name="studentSubmitBtn">Submit</button>
            <a href="students.php" class="btn btn-secondary">Close</a>
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