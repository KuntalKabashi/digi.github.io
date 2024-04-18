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
    }
    if(isset($_REQUEST['submitFeedbackBtn'])){
        //Cheaking for Empty Fields
        if(($_REQUEST['f_content'] == "")){
        //msg displayed if required fileds are missing
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields are Reqired!..</div>';
    }else{
        $fcontent = $_REQUEST['f_content'];
        $sql ="INSERT INTO feedback (f_content,stu_id) VALUES ('$fcontent','$stuId')";

        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2"> Submitted Successfully...</div>';
        }else{
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Unable to Submit!..</div>';
        }
    }
}
?>
<div class="col-sm-6 mt-5">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stuId"><i class="fa-solid fa-graduation-cap"></i>Student ID</label>
            <input type="text" class="form-control" id="stuId" name="stuId" value="<?php if(isset($stuId)){echo $stuId;}?>" readonly>
        </div>
        <div class="form-group">
            <label for="f_content"><i class="fa-solid fa-pen"></i>Write Feedback:</label>
            <textarea class="form-control" id="f_content" name="f_content" row=2></textarea>
        </div>
        <button type="submit" class="btn btn-success mr-3 mt-4" id="submitFeedbackBtn" name="submitFeedbackBtn">Submit</button>
        <button type="reset" class="btn btn-secondary mt-4">Reset</button>
        <?php 
           if(isset($msg)) {echo $msg;}
        ?>
    </form>
   </div>
<?php 
include('./stuInclude/footer.php');
?>