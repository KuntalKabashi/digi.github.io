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
 ?>

         <div class="col-sm-9 mt-5">
            <!--Table-->
            <p class="bg-dark text-white p-2">List of Students <i class="fa-solid fa-user"></i></p>
            <?php 
                $sql= "SELECT * FROM student";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
            ?>
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Student ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php while($row =$result->fetch_assoc()){ 
                        echo'<tr>';
                            echo'<th scope="row">'.$row['Stu_id'].'</th>';
                            echo'<td>'.$row['Stu_name'].'</td>';
                            echo'<td>'.$row['Stu_email'].'</td>';
                            echo'<td>';
                            echo'<form action="editstudent.php" method="POST" class="d-inline">
                                    <input type="hidden" name="id" value='.$row["Stu_id"].'>
                                    <button type="submit" class="btn btn-info mr-3" name="view" value="view"><i class="fa-solid fa-pen"></i></button>
                                </form>';

                            echo'<form action="" method="POST" class="d-inline">
                                    <input type="hidden" name="id" value='.$row["Stu_id"].'>
                                    <button type="submit" class="btn btn-secondary" name="delete" value="delete"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>';
                        echo'</tr>';
                     } ?>
                    </tbody>
            </table>
            <?php }else{
                echo "There is no Student add !...";
            }
            
            if(isset($_REQUEST['delete'])){
                $sql = "DELETE FROM student WHERE Stu_id ={$_REQUEST['id']}";
                if($conn->query($sql) == TRUE){
                    echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                }else{
                    echo'Unabale to delete Data!...';
                }
            }
            
            ?>
        </div>
         
        <div>
            <a class="btn btn-danger box" href="../Admin/addStudent.php"><i class="fas fa-plus fa-2x"></i></a>
        </div>
<?php 
    include('../Admin/admininclude/footer.php');
 ?>