<?php 
    include('../digiLearning/dbConnection.php');
    include('./mainInclude/header.php');
    if(isset($_REQUEST['submit'])){
        //Cheaking for Empty Fields
        if(($_REQUEST['name'] == "") || ($_REQUEST['subject'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['about'] == "")){
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields are Reqired!..</div>';
        }else{
            $name = $_REQUEST['name'];
            $sub= $_REQUEST['subject'];
            $mail = $_REQUEST['email'];
            $about = $_REQUEST['about'];
            $sql ="INSERT INTO contact (name,subject,email,about)
            VALUES ('$name','$sub','$mail','$about')";

            if($conn->query($sql) == TRUE){
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Mail Send Successfully..</div>';
            }else{
                $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to Send mail!</div>';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
<!--Start course page banner-->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./image/Images/courses.webp" alt="courses" style="height: 500px; width:100%; object-fit:cover; box-shadow: 10px;"/>
    </div>
</div>
<!--End course page banner-->

    <!--Start contact us-->
    <div class="container mt-4" id="Contact">
        <h2 class="text-center mb-4"><b>Contact US</b> <i class="fa-solid fa-phone"></i></h2>
        <div class="row">
            <div class="col-md-8">
                <form action="" method="post">
                    <input type="text" class="form-control" name="name" placeholder="Name"><br>
                    <input type="text" class="form-control" name="subject" placeholder="Subject"><br>
                    <input type="email" class="form-control" name="email" placeholder="E-mail"><br>
                    <textarea class="form-control" name="about" placeholder="How can we help you?" style="height:150px;"></textarea><br>
                    <input class="btn btn-primary" type="submit" value="Send" name="submit"><br><br>
                    <?php 
                         if(isset($msg)) {echo $msg;}
                    ?>
                </form>
            </div> <!--End contact us-->
            <div class="col-md-4 stripe text-white text-center">
                <h4>digiLearning</h4>
                <p>digiLearning,
                    Near Salt Lake Sector- IV, Kolkata,
                    Kolkata - 7000118<br />
                    Phone: +91 9748193476<br /> 
                    www.digiLearning.com
                </p>
            </div>
        </div>
    </div><!--End Contact Us container-->
    <!--Start Social follow-->
    <div class="container-fluid bg-danger">
        <div class="row text-white text-center p-1">
            <div class="col-sm">
                <a class="text-white social-hover" href="https://www.facebook.com/kuntal.kabashi.9?mibextid=ZbWKwL"><i class="fa-brands fa-facebook"></i>Facebook</a>
            </div>
            <div class="col-sm">
                <a class="text-white social-hover" href="https://twitter.com/KabashiKuntal"><i class="fa-brands fa-twitter"></i>Twitter</a>
            </div>
            <div class="col-sm">
                <a class="text-white social-hover" href="https://www.linkedin.com/in/kuntal-kabashi-a74501210/"><i class="fa-brands fa-linkedin"></i>linkdin</a>
            </div>
            <div class="col-sm">
                <a class="text-white social-hover" href="https://instagram.com/kuntalk_official?igshid=ZDdkNTZiNTM="><i class="fa-brands fa-instagram"></i>Instagram</a>
            </div>
        </div>
    </div>
    <!--End Social follow-->
       <!--Start About Section-->
    <div class="container-fluid p-4" style="background-color:azure">
        <div class="container" style="background-color:azure">
            <div class="row text-center">
                <div class="col-sm">
                    <h5>About Us</h5>
                    <p>digiLearning provides universal access to the world's best
                        education, parenting with top universities and organizations
                        to offter courses online.
                    </p>
                </div>
                <div class="col-sm">
                    <h5>Category</h5>
                    <a class="text-dark" href="https://www.w3schools.com/whatis/">Web Development</a><br />
                    <a class="text-dark" href="https://www.coursera.org/articles/web-designer">Web Designer</a><br />
                    <a class="text-dark" href="https://www.tutorialspoint.com/android/index.htm">Android App Dev</a><br />
                    <a class="text-dark" href="https://www.javatpoint.com/ios-development-using-swift">iOS Development</a><br />
                    <a class="text-dark" href="https://www.geeksforgeeks.org/what-is-data-analysis/">Data Analysis</a><br />
                </div>
                <div class="col-sm">
                    <h5>Contact Us</h5>
                    <p>digiLearning Pvt Ltd <br> Near Sisksha Bhavan <br> Kolkata,
                    West Bengal <br> Ph. +91 9748193476</p>
                </div>
            </div>
        </div>
    </div>
    <!--End About Section-->
<?php 
    include('./mainInclude/footer.php')
?>
</body>
</html>