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
//update
if(isset($_REQUEST['reqstuupdate'])){
    //Cheaking for Empty Fields
    if(($_REQUEST['Stu_name'] == "") || ($_REQUEST['Stu_email'] == "") || ($_REQUEST['Stu_pass'] == "") ||
        ($_REQUEST['Stu_occ'] == "")){
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields are Reqired!..</div>';
        }else{
            $Sid = $_REQUEST['Stu_id'];
            $Sname = $_REQUEST['Stu_name'];
            $Semail = $_REQUEST['Stu_email'];
            $Spass = $_REQUEST['Stu_pass'];
            $Socc = $_REQUEST['Stu_occ'];

        $sql ="UPDATE student SET Stu_id ='$Sid',Stu_name='$Sname',Stu_email='$Semail',Stu_pass='$Spass',Stu_occ='$Socc'
         WHERE Stu_id='$Sid'";

        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Student Updated Successfully...</div>';
        }else{
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to Update Student!..</div>';
        }
    }
}

 ?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Student Details <i class="fa-solid fa-pen-to-square"></i></h3>

    <?php 
        if(isset($_REQUEST['view'])){
            $sql ="SELECT * FROM student WHERE Stu_id={$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="Stu_id"><i class="fa-solid fa-id-card-clip"></i> Student ID</label>
            <input type="text" class="form-control" id="Stu_id" name="Stu_id" value="<?php if(isset($row['Stu_id'])){echo $row['Stu_id']; }?>" readonly>
        </div>
        <div class="form-group">
            <label for="Stu_name"><i class="fa-solid fa-file-signature"></i> Student Name</label>
            <input type="text" class="form-control" id="Stu_name" name="Stu_name" value="<?php if(isset($row['Stu_name'])){echo $row['Stu_name']; }?>">
        </div>
        <div class="form-group">
            <label for="Stu_email"><i class="fa-solid fa-envelope"></i> Student Email</label>
            <input type="text" class="form-control" id="Stu_email" name="Stu_email" value="<?php if(isset($row['Stu_email'])){echo $row['Stu_email']; }?>">
        </div>
        <div class="form-group">
            <label for="Stu_pass"><i class="fa-solid fa-key"></i> Password</label>
            <input type="text" class="form-control" id="Stu_pass" name="Stu_pass" value="<?php if(isset($row['Stu_pass'])){echo $row['Stu_pass']; }?>">
        </div>
        <div class="form-group">
            <label for="Stu_occ"><i class="fa-solid fa-circle-info"></i> Student Occupation</label>
            <input type="text" class="form-control" id="Stu_occ" name="Stu_occ" value="<?php if(isset($row['Stu_occ'])){echo $row['Stu_occ']; }?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="reqstuupdate" name="reqstuupdate">Update</button>
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