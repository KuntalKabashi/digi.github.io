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
        if(isset($_REQUEST['stuPassUpdateBtn'])){
            //Cheaking for Empty Fields
            if(($_REQUEST['stuNewPass'] == "")){
            //msg displayed if required fileds are missing
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Reqired</div>';
        }else{
            $sql= "SELECT * FROM student WHERE Stu_email='$stuEmail'";
            $result = $conn->query($sql);
            if($result->num_rows == 1){
                $stuPass= $_REQUEST['stuNewPass'];
                $sql="UPDATE student SET Stu_pass = '$stuPass' WHERE Stu_email = '$stuEmail'";
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
                    <label for="inputEmail"><i class="fa-solid fa-envelope"></i>Email</label>
                    <input type="email" class="form-control" id="inputEmail" value="<?php echo $stuEmail ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="inputNewPassword"><i class="fa-solid fa-key"></i>Password</label>
                    <input type="password" class="form-control" id="inputNewPassword" placeholder="New Password" name="stuNewPass">
                </div>
                <button type="submit" class="btn btn-success mr-4 mt-4" name="stuPassUpdateBtn">Update</button>
                <button type="reset" class="btn btn-secondary  mt-4">Reset</button>
                <?php if(isset($passmsg)) {echo $passmsg;} ?>
            </form>
        </div>
    </div>
 </div>

<?php 
include('./stuInclude/footer.php');
?>