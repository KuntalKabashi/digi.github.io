<!--Start include header-->
<?php 
    include('./dbConnection.php');
    include('./mainInclude/header.php');
?>
<!--End include header-->

    <!--Start Video Background-->
    <div class="container-fluid remove-vid-marg">
        <div class="vid-parent">
            <video playsinline autoplay muted loop>
                <source src="video/banvid.mp4">
            </video>
            <div class="vid-overlay"></div>
        </div>
        <div class="vid-content pb-2">
            <h1 class="my-content pb-2">Welcome to digiLearning </h1>
            <small class="my-content">Learn Digitally</small><br />
            <?php 
                if(!isset($_SESSION['is_login'])){
                    echo '<a href="#" class="btn btn-danger mt-3" data-toggle="modal" data-target="#stuRegModalCenter">Lets Start</a>';
                }
                else{
                    echo'<a class="btn btn-primary mt-3" href="Student/studentProfile.php">MyProfile</a>';
                }
            ?>    
        </div>
    </div>
    <!--End Video Background-->

    <!--Start text banner-->
    <div class="container-fluid bg-danger txt-banner">
        <div class="row bottom-banner">
            <div class= "col-sm">
                <h5><i class="fas fa-book-open mr-3"></i> 100+ Online Courses</h5>
            </div>
            <div class= "col-sm">
                <h5><i class="fas fa-users mr-3"></i> Expert Instructors</h5>
            </div>
            <div class= "col-sm">
                <h5><i class="fas fa-keyboard mr-3"></i> Lifetime Access</h5>
            </div>
            <div class= "col-sm">
                <h5><i class="fas fa-indian-rupee-sign mr-3"></i> All Free Courses*</h5>
            </div>
        </div>
    </div>
    <!--End text banner-->

    <!--Start most Popular course-->
    <div class="container mt-5">
        <h1 class="text-container"style="text-align:center;">Popular Course <i class="fa-solid fa-fire"></i></h1>
    <!--Start most Popular course 1st card deck-->
    <div class="card-deck mt-4">
        <?php 
            $sql= "SELECT * FROM course LIMIT 3";
            $result=$conn->query($sql);
            if($result->num_rows >0){
                while($row = $result->fetch_assoc()){
                    $course_id= $row['course_id'];
                    echo' 
                    <a href="coursedetails.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px; margin:0px;">
                    <div class="card bg-light mb-4 border-light mb-4" style="width: 20rem;">
                        <div class="card-header">
                            <img src="'.str_replace('..','.', $row['course_img']).'" class="card-img-top" alt="Card image cap" />
                            <div class="card-body">
                                <h5 class="card-title">'.$row['course_name'].'</h5>
                                <p class="card-text">'.$row['course_desc'].'</p>
                             </div>
                        </div>
                        <div class="card-footer">
                            <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_original_price'].'</del></small>
                            <span class="font-weight-bolder">&#8377 '.$row['course_price'].'</span>
                            </p><a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_id='.$course_id.'">Enroll</a>
                        </div>
                    </div>
                    </a>';
                }
            }
        ?>
    </div>
    <!--End most Popular course 1st card deck-->

       <!--Start most Popular course 2nd card deck-->
       <div class="card-deck mt-4">
        <?php 
            $sql= "SELECT * FROM course LIMIT 3, 3";
            $result=$conn->query($sql);
            if($result->num_rows >0){
                while($row = $result->fetch_assoc()){
                    $course_id= $row['course_id'];
                    echo' 
                    <a href="coursedetails.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px; margin:0px;">
                        <div class="card bg-light mb-3 border-light mb-3" style="width: 20rem;">
                        <div class="card-header">
                            <img src="'.str_replace('..','.', $row['course_img']).'" class="card-img-top" alt="Card image cap" />
                            <div class="card-body">
                                <h5 class="card-title">'.$row['course_name'].'</h5>
                                <p class="card-text">'.$row['course_desc'].'</p>
                             </div>
                        </div>
                        <div class="card-footer">
                            <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_original_price'].'</del></small>
                            <span class="font-weight-bolder">&#8377 '.$row['course_price'].'</span>
                            </p><a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_id='.$course_id.'">Enroll</a>
                        </div>
                    </div>
                    </a>';
                }
            }
        ?>
    </div>
    <!--End most Popular course 2nd card deck-->
    <div class="text-center m-2">
        <a class="btn btn-danger btn-sm" href="courses.php"> View All Course</a>
    </div>
    </div>
    <!--End most Popular course-->

    <!--Start contact us container-->
    <?php
        include('./contact.php');
    ?>
    <!--End Contact Us container-->

    <!--Start Testimonial  container-->
    <div id="testimonial" class="section-padding">
     <h3 class="text-center text-white mb-5">Studnet Feedbacks <i class="fa-solid fa-comments"></i></h3>
      <div class="container">
          <div class="owl-carousel owl-theme wow fadeInUp" data-wow-delay="1s">
                <?php 
            
                $sql="SELECT s.Stu_name,s.Stu_occ,s.Stu_img,f.f_content FROM student AS s JOIN feedback AS f ON s.Stu_id = f.stu_id";
                $result=$conn->query($sql);
                if($result->num_rows >0){
                while($row = $result->fetch_assoc()){
                    $s_img= $row['Stu_img'];
                    $n_img=str_replace('..','.', $s_img);
             
                ?>
                <div class="item">
                    <div class="testimonial-item">
                        <div class="img-thumb">
                            <img src="<?php echo $n_img?>" alt=""/>
                        </div>
                        <div class="info">
                          <h2>
                              <a class="dropdown-item custom-nav-it" data-toggle="modal" data-target="#stuLoginModalCenter"><?php echo $row['Stu_name']; ?></a>
                          </h2>
                          <h3>
                              <a href="#"><?php echo $row['Stu_occ']; ?></a>
                          </h3>
                      </div>
                        <div class="content">
                            <div class="description">
                                <p><?php echo $row['f_content']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }
                }?>
            </div>
        </div>
    </div>
    <!--End Testimonial  container-->

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

<!--Start include footer-->
<?php 
    include('./mainInclude/footer.php')
?>
<!--End include footer-->