 <!--Start Footer-->
 <footer class="container-fluid bg-dark text-center p-2">
        <small class="text-white">Copyright &copy; 2023 || Designed By
            Kabashi ||
        </small>
        <a href="#" data-toggle="modal"data-target="#adminLoginModalCenter">admin login</a>
  </footer>
 <!--End Footer-->

    <!--Start Student Registration-->
 
<!-- Modal -->
<div class="modal fade" id="stuRegModalCenter" tabindex="-1" role="dialog" aria-labelledby="stuRegModalCenterLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color:darkorange">
      <div class="modal-header">
        <h5 class="modal-title" id="stuRegModalCenterLabel">Student Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--Start Student registration form-->
        <?php 
          include('studentRegistration.php'); 
        ?>
        <!--End Student registration form-->
      </div>
      <div class="modal-footer">
        <span id="successMsg"></span>
        <button type="button" class="btn btn-primary" onclick="addStu()" id="signup">Sign Up</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--End Student Registration-->

<!-- Student Login form-->
    <!-- Modal -->
<div class="modal fade" id="stuLoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="stuLoginModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content"style="background-color:darkorange">
      <div class="modal-header">
        <h5 class="modal-title" id="stuLoginModalCenterLabel">Student Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--Start Student login form-->
      <form id="stuLoginForm">
  <div class="form-group">
        <i class="fa-solid fa-envelope"></i><label for="stuLogmail" class="pl-2 font-weight-bold">Email address</label>
        <input type="email" class="form-control" id="stuLogmail" name="stuLogmail" placeholder="Enter email">
  </div>
  <div class="form-group">
    <i class="fa-solid fa-key"></i><label for="stuLogpass" class="pl-2 font-weight-bold">Password</label>
    <input type="password" name="stuLogpass" class="form-control" id="stuLogpass" placeholder="Password">
  </div>
</form>
<!--End Student login form-->
      </div>
      <div class="modal-footer">
        <small id="statusLogMsg"></small>
        <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="cheakStuLogin()">Login</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!--End Student Login form-->


<!-- Admin Login form-->
    <!-- Modal -->
    <div class="modal fade" id="adminLoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="adminLoginModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content"style="background-color:darkorange">
      <div class="modal-header">
        <h5 class="modal-title" id="adminLoginModalCenterLabel">Admin Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--Start Admin login form-->
      <form id="adminLoginForm">
  <div class="form-group">
        <i class="fa-solid fa-envelope"></i><label for="adminLogmail" class="pl-2 font-weight-bold">Email address</label>
        <input type="email" class="form-control" id="adminLogmail" name="adminLogmail" placeholder="Enter email">
  </div>
  <div class="form-group">
    <i class="fa-solid fa-key"></i><label for="adminLogpass" class="pl-2 font-weight-bold">Password</label>
    <input type="password" name="adminLogpass" class="form-control" id="adminLogpass" placeholder="Password">
  </div>
</form>
<!--End Admin login form-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="adminLoginBtn" onclick="cheakAdminLogin()">Login</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!--End Admin Login form-->

    <!--JQuery and Bootstrap JS-->
    <script src="JS/jquery.min.js"></script>
    <script src="JS/popper.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>

    <script src="JS/all.min.js"></script>
    <script type="text/javascript" src="JS/slider.js"></script>

    <!--Student Ajax call JS-->
    <script type="text/javascript" src="JS/ajaxrequest.js"></script>
    </body>

    <!--Admin Ajax call JS-->
    <script type="text/javascript" src="JS/adminajaxrequest.js"></script>
    <!--caresoule JS-->
    <script src="JS/owl.carousel.min.js"></script>
    <script src="JS/wow.min.js"></script>
    <script src="JS/script.js"></script>
    </body>
</html>