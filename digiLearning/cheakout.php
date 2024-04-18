<?php 
    include('./dbConnection.php');
    include('./mainInclude/header.php');
    session_start();
    if(!isset($_SESSION['stuLogEmail'])){
        echo "<script> location.href= 'loginorsignup.php' </script>";
    }else{
$stuEmail=$_SESSION['stuLogEmail'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!--BootStrap CSS-->
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
        <!--Font Awesome CSS-->
        <link rel="stylesheet" href="CSS/all.min.css">
        <!--Google Font-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:ital@1&display=swap" rel="stylesheet">
        <!--Custom CSS-->
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/style1.css">
        <script src="https://js.stripe.com/v3/"></script>
    <title></title>
</head>
<body>

<!--Start course page banner-->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./image/Images/courses.webp" alt="courses" style="height: 500px; width:100%; object-fit:cover; box-shadow: 10px;"/>
    </div>
</div>
<!--End course page banner-->

<?php
if(isset($_REQUEST['enrollBtn'])){
    //Cheaking for Empty Fields
    if(($_REQUEST['course_id'] == "") || ($_REQUEST['Stu_email'] == "")){
        //msg displayed if required fileds are missing
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields are Reqired!..</div>';
    }else{
        
        $cid = $_REQUEST['course_id'];
        $smail = $_REQUEST['Stu_email'];
        $date = $_REQUEST['date'];
        $sql ="INSERT INTO enroll(course_id,stu_email,date) VALUES ('$cid','$smail','$date')";

        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Enroll Successfull...</div>';
        }else{
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to Enroll !..</div>';
        }
    }
}

?>
<div class="mt-5 mr-5 ml-5 jumbotron">
    <h3 class="text-center">Enroll Details</h3>
    <form action="" method="POST">
        <div class="form-group">
            <label for="course_id"><i class="fa-solid fa-id-card"></i> <b>Course ID</b></label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id'];} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="Stu_email"><i class="fa-solid fa-envelope"></i> <b>Student Email</b></label>
            <input type="text" class="form-control" id="Stu_email" name="Stu_email" value="<?php if(isset($stuEmail)){echo $stuEmail; }?>" readonly>
        </div>
        <div class="form-group">
            <label for="date"><i class="fa-solid fa-calendar-days"></i> <b>Date</b></label>
            <input type="text" class="form-control" id="date" name="date" value="<?php echo date("Y/m/d")?>"readonly>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="enrollBtn" name="enrollBtn">lets learn</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
        <?php 
           if(isset($msg)) {echo $msg;}
        ?>
    </form>
</div>

 <!--Start contact us container-->
 <?php
        include('./contact.php');
  ?>
    <!--End Contact Us container-->

</body>
</html>

<?php 
    }
?>
<?php 
    include('./mainInclude/footer.php')
?>