<?php 
    if(!isset($_SESSION)){
        session_start();
    }
        include('../digiLearning/dbConnection.php');
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

<!--Start contact us-->
    <div class="container mt-4" id="Contact">
        <h2 class="text-center mb-4">Contact US <i class="fa-solid fa-phone"></i></h2>
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