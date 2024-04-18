<?php 
    include('./dbConnection.php');
    include('./mainInclude/header.php');
?>
<!--Start course page banner-->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./image/Images/courses.webp" alt="courses" style="height: 500px; width:100%; object-fit:cover; box-shadow: 10px;"/>
    </div>
</div>
<!--End course page banner-->

<div class="container jumbotron mb-5">
    <div class="row">
        <div class="col-md-4">
            <h5 class="mb-3">If Already Registered !! Login</h5>
            <form role="form" id="stuLoginForm">
                <div class="form-group">
                    <i class="fas fa-envelope"></i><label for="stuLogEmail" class="pl-2 font-weight-bold">Email</label>
                    <small id="statusLogMsg1"></small><input type="email" class="form-control" placeholder="Email" name="stuLogmail" id="stuLogmail">
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i><label for="stuLogPass" class="pl-2 font-weight-bold">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="stuLogpass" id="stuLogpass">
                </div>
                <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="cheakStuLogin()">Login</button>
            </form></br>
            <small id="statusLogMsg"></small>
        </div>
        <div class="col-md-6 offset-md-1">
            <h5 class="mb-3">New User !! Sign Up</h5>
            <form id="stuRegForm">
                <div role="form" class="form-group">
                    <i class="fa-solid fa-user"></i><label for="stuname" class="pl-2 font-weight-bold">Name</label><small id="statusMsg1"></small>
                    <input type="text" class="form-control" placeholder="Name" name="stuname" id="stuname">
                </div>

                <div class="form-group">
                    <i class="fa-solid fa-envelope"></i><label for="stumail" class="pl-2 font-weight-bold">Email address</label><small id="statusMsg2"></small>
                    <input type="email" class="form-control" id="stumail" name="stumail" placeholder="Enter email">
                    <small>We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <i class="fa-solid fa-key"></i><label for="stupass" class="pl-2 font-weight-bold">New Password</label><small id="statusMsg3"></small>
                    <input type="password" name="stupass" class="form-control" id="stupass" placeholder="Password">
                </div>
                <button type="button" class="btn btn-primary" onclick="addStu()">Sign Up</button>
            </form></br>
            <small id="successMsg"></small>
        </div>
    </div>
</div>
</hr>

<?php 
include('./contact.php');
?>

<?php 
    include('./mainInclude/footer.php')
?>