<?php 
    if(!isset($_SESSION)){
        session_start();
    }
        include('../dbConnection.php');
    
        if(isset($_SESSION['is_login'])){
            $stuEmail= $_SESSION['stuLogEmail'];
        }else{
            echo "Unabale to Go Through!";
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--BootStrap CSS-->
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <!--Font Awesome CSS-->
    <link rel="stylesheet" href="../CSS/all.min.css">
    <!--Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:ital@1&display=swap" rel="stylesheet">
    <!--Custom CSS-->
    <link rel="stylesheet" href="../CSS/stustyle.css">
</head>
<body>
    <div class="container-fluid p-2" style="background-color:blueviolet">
        <h3 class="text-white"><i class="fa-brands fa-dashcube"></i> Welcome to digiLearning</h3>
        <a class="btn btn-danger" href="./myCourse.php">My Courses <i class="fa-solid fa-file"></i></a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 border-right">
                <h4 class="text-center">Lessons <i class="fa-solid fa-book"></i></h4>
                <ul id="playlist" class="nav flex-column">
                <?php 
                    if(isset($_GET['course_id'])){
                        $course_id = $_GET['course_id'];
                        $sql="SELECT * FROM lesson WHERE course_id='$course_id'";
                        $result= $conn->query($sql);
                        if($result->num_rows >0){
                            while($row =$result->fetch_assoc()){
                                echo'<li class="nav-item border-bottom py-2" movieurl= '.$row['lesson_link'].' style="cursor:pointer">'
                                .$row['lesson_name'].'</li>';
                            }
                        }
                    }
                ?>
                </ul>
            </div>
            <div class="col-sm-8">
                <video id="videoarea" src="" class="mt-5 w-75 ml-2" controls></video>
            </div>
        </div>
    </div>




    <!--Jquery and bootstrap JavaScript-->
    <script type="text/javascript" src="../JS/jquery.min.js"></script>
    <script type="text/javascript" src="../JS/popper.min.js"></script>
    <script type="text/javascript" src="../JS/bootstrap.min.js"></script>

    <!--Font Awesome JS-->
    <script type="text/javascript" src="../JS/all.min.js"></script>

    <!--Admin Ajax call JS-->
    <!--<script type="text/javascript" src="../JS/adminajaxrequest.js"></script>-->

    <!--Custom javascript-->
    <script type="text/javascript" src="../JS/custom.js"></script>
</body>
</html>