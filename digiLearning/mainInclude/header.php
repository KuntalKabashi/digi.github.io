<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewpoint" content="width=device-width,initial-scale=1.0">
        <!--BootStrap CSS-->
        <link rel="stylesheet" href="CSS/bootstrap.min.css">
        <!--Font Awesome CSS-->
        <link rel="stylesheet" href="CSS/all.min.css">
        <!--Google Font-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:ital@1&display=swap" rel="stylesheet">
        <!--Carousel Slider CSS-->
        <link rel="stylesheet" href="https://cdn.lineicons.com/2.0/LineIcons.css">
        <link rel="stylesheet" href="CSS/owl.carousel.min.css">
        <link rel="stylesheet" href="CSS/owl.theme.default.min.css">
        <link rel="stylesheet" href="CSS/animate.css">
        <!--Custom CSS-->
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/style1.css">
        <title>digiLearning</title>
    </head>
    <body>
    <!--Start Navigation-->
    <nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top" style="background-color:indigo">
  <a class="navbar-brand" href="index.php"><i class="fa-brands fa-dashcube"></i> digiLearning</a>
  <span class="navbar-text">Learn Digitally</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav custom-nav pl-5">
      <li class="nav-item custom-nav-item active">
      <i class="pt-4"style="font-size:30px;color:white;"></i><a class="nav-link" href="index.php">Home <i class="fa-solid fa-house"></i><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item custom-nav-item">
      <i class="pt-4"style="font-size:24px;color:white;"></i><a class="nav-link" href="courses.php">Courses <i class="fa-solid fa-book-open"></i></a>
      </li> 
      <li class="nav-item custom-nav-item">
      <i class="pt-4"style="font-size:24px;color:white;"></i><a class="nav-link" href="headercontact.php">Contact <i class="fa-solid fa-address-book"></i></a>
      </li>
          <?php 
              session_start();
              if(isset($_SESSION['is_login'])){
                echo' <li class="nav-item custom-nav-item">
                        <i class="pt-4"style="font-size:24px;color:white;"></i><a class="nav-link" href="Student/stuFeedback.php">Feedback <i class="fa-solid fa-comments"></i></a>
                      </li>
                      <li class="nav-item custom-nav-item">
                        <i class="pt-4"style="font-size:24px;color:white;"></i><a class="nav-link" href="Student/studentProfile.php">MyProfile <i class="fa-solid fa-user"></i></a>
                      </li>
                      <li class="nav-item custom-nav-item">
                        <i class="pt-4"style="font-size:24px;color:white;"></i><a class="nav-link" href="logout.php">Logout <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                      </li>';

              }else{
                echo '<li class="nav-item custom-nav-item">
                        <i class="pt-4"style="font-size:24px;color:white;"></i><a class="nav-link" href="loginorsignup.php">Feedback <i class="fa-solid fa-comments"></i></a>
                      </li>
                      <li class="nav-item custom-nav-item">
                        <i class="pt-4"style="font-size:24px;color:white;"></i><a class="nav-link" data-toggle="modal" data-target="#stuLoginModalCenter">Login <i class="fa-solid fa-right-to-bracket"></i></a>
                      </li>
                      <li class="nav-item custom-nav-item">
                        <i class="pt-4"style="font-size:24px;color:white;"></i><a class="nav-link" data-toggle="modal" data-target="#stuRegModalCenter">Signup <i class="fa-solid fa-user-plus"></i></a>
                      </li>';
              }
          ?>
    </ul>

  </div>
</nav>
    <!--End Navigation-->