<?php 
    if(!isset($_SESSION)){
        session_start();
    }
        include('./stuInclude/header.php');
        include_once('../dbConnection.php');
    
        if(isset($_SESSION['is_login'])){
            $stuEmail= $_SESSION['stuLogEmail'];
        }else{
            echo "Unabale to Go Through!";
        }
    $sql ="SELECT * FROM student WHERE Stu_email='$stuEmail'";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
    $row =$result->fetch_assoc();
    $stuId= $row['Stu_id'];
    $stuName= $row['Stu_name'];
    $stuOcc= $row['Stu_occ'];
    $stuImg= $row['Stu_img'];
    }
    //update
    if(isset($_REQUEST['updateStuBtn'])){
        //Cheaking for Empty Fields
        if(($_REQUEST['stuName'] == "")){
        //msg displayed if required fileds are missing
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields are Reqired!..</div>';
    }else{
        $Sname = $_REQUEST['stuName'];
        $Socc = $_REQUEST['stuOcc'];
        $Simg = $_FILES['stuImg']['name'];
        $Simg_temp = $_FILES['stuImg']['tmp_name'];
        $img_folder = '../image/Students/'.$Simg;
        move_uploaded_file($Simg_temp,$img_folder);


        $sql ="UPDATE student SET Stu_name='$Sname',Stu_occ='$Socc',Stu_img='$img_folder' where Stu_email='$stuEmail'";

        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2"> Updated Successfully...</div>';
        }else{
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Unable to Update!..</div>';
        }
    }
}

?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <?php 
        if(isset($_REQUEST['view'])){
            $sql ="SELECT * FROM lesson WHERE lesson_id={$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stuId"><i class="fa-solid fa-graduation-cap"></i>Student ID</label>
            <input type="text" class="form-control" id="stuId" name="stuId" value="<?php if(isset($stuId)){echo $stuId;}?>" readonly>
        </div>
        <div class="form-group">
            <label for="stuEmail"><i class="fa-solid fa-envelope"></i>Email</label>
            <input type="text" class="form-control" id="stuEmail" name="stuEmail" value="<?php echo $stuEmail ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stuName"><i class="fa-solid fa-signature"></i>Name</label>
            <input type="text" class="form-control" id="stuName" name="stuName" value="<?php if(isset($stuName)){echo $stuName;}?>">
        </div>
        <div class="form-group">
            <label for="stuOcc"><i class="fa-solid fa-user"></i>Occupation</label>
            <input type="text" class="form-control" id="stuOcc" name="stuOcc" value="<?php if(isset($stuOcc)){echo $stuOcc;}?>">
        </div>
        <div class="form-group">
            <label for="stuImg"><i class="fa-solid fa-image"></i>Upload Image</label>
            <input type="file" class="form-control-file" id="stuImg" name="stuImg">
        </div>
        <button type="submit" class="btn btn-success" id="updateStuBtn" name="updateStuBtn">Update</button>
        <?php 
           if(isset($msg)) {echo $msg;}
        ?>
    </form>
   </div>
<?php 
include('./stuInclude/footer.php');
?>