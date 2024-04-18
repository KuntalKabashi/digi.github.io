<?php 
if(!isset($_SESSION)){
    session_start();
}
    include('../Admin/admininclude/header.php');
    include('../dbConnection.php');

    if(isset($_SESSION['is_admin_login'])){
        $adminEmail= $_SESSION['adminLogEmail'];
    }else{
        echo "Unabale to Go Through!";
    }
    $adminEmail = $_SESSION['adminLogEmail'];
    if(isset($_REQUEST['adminPassUpdateBtn'])){
        if(($_REQUEST['adminPass'] == "")){
            $passmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill all Fields!...</div>';
        }else{
            $sql= "SELECT * FROM admin WHERE admin_email='$adminEmail'";
            $result = $conn->query($sql);
            if($result->num_rows == 1){
                $adminPass= $_REQUEST['adminPass'];
                $sql="UPDATE admin SET admin_pass = '$adminPass' WHERE admin_email = '$adminEmail'";
                if($conn->query($sql) == TRUE){
                    $passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
                }else{
                    $passmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Unabale to Update!...</div>';
                }
            }
        }
    }
 ?>

 <div class="col-sm-9 mt-5">
    <div class="row">
        <div class="col-sm-6">
            <form class="mt-5 mx-5">
                <div class="form-group">
                    <label for="inputEmail"><i class="fa-solid fa-envelope"></i> Email</label>
                    <input type="email" class="form-control" id="inputEmail" value="<?php echo $adminEmail ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="inputNewPassword"><i class="fa-solid fa-key"></i> Password</label>
                    <input type="password" class="form-control" id="inputNewPassword" placeholder="New Password" name="adminPass">
                </div>
                <button type="submit" class="btn btn-danger mr-4 mt-4" name="adminPassUpdateBtn">Update</button>
                <button type="reset" class="btn btn-secondary mt-4">Reset</button>
                <?php if(isset($passmsg)) {echo $passmsg;} ?>
            </form>
        </div>
    </div>
 </div>

 <?php 
    include('../Admin/admininclude/footer.php');
 ?>