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
    $sql="SELECT * FROM course";
    $result=$conn->query($sql);
    $totalcourse=$result->num_rows;

    $sql="SELECT * FROM student";
    $result=$conn->query($sql);
    $totalstu=$result->num_rows;

    $sql="SELECT * FROM enroll";
    $result=$conn->query($sql);
    $totalen=$result->num_rows;


 ?>
        <div class="col-sm-9 mt-5">
                    <div class="row mx-5 text-center">
                        <div class="col-sm-4 mt-5">
                            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                <div class="card-header">Courses <i class="fa-solid fa-book"></i></div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <?php echo $totalcourse; ?>
                                    </h4>
                                    <a class="btn text-white" href="courses.php"><i class="fa-solid fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-5">
                            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                <div class="card-header">Students <i class="fas fa-users"></i></div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <?php echo $totalstu; ?>
                                    </h4>
                                    <a class="btn text-white" href="students.php"><i class="fa-solid fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-5">
                            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                                <div class="card-header">Enroll <i class="fa-solid fa-ticket"></i></div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <?php echo $totalen; ?>
                                    </h4>
                                    <a class="btn text-white" href="enroll.php"><i class="fa-solid fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mx-5 mt-5 text-center">
                        <!--Table-->
                        <p class="bg-dark text-white p-2">Course Enroll <i class="fa-solid fa-book"></i></p>
                        <?php 
                        $sql="SELECT * FROM enroll";
                        $result=$conn->query($sql);
                        if($result->num_rows >0){
                            echo'<table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Enroll ID</th>
                                    <th scope="col">Course ID</th>
                                    <th scope="col">Student Email</th>
                                    <th scope="col">Enroll Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>';
                            while($row =$result->fetch_assoc()){
                                echo'<tr>';
                                echo'<td>'.$row["e_id"].'</td>';
                                echo'<td>'.$row["course_id"].'</td>';
                                echo'<td>'.$row["stu_email"].'</td>';
                                echo'<td>'.$row["date"].'</td>';
                                echo'<td><button type="submit" class="btn btn-secondary" name="delete" value="delete"><i class="far fa-trash-alt"></i></button></td>';
                                echo'</tr>';
                        }
                       echo' </tbody>
                    </table>';
                        }
                        ?>
                    </div>
                </div>
            </div><!--div row close from header-->
        </div><!--div container-fluid close from header-->
<?php 
    include('../Admin/admininclude/footer.php');
 ?>
