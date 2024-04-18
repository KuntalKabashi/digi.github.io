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
            <p class="bg-dark text-white p-2">List of Feedbacks <i class="fa-solid fa-comments"></i></p>
            <?php 
                $sql= "SELECT * FROM feedback";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
            ?>
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Feedback ID</th>
                            <th scope="col">Content</th>
                            <th scope="col">Student ID</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php while($row =$result->fetch_assoc()){ 
                        echo'<tr>';
                            echo'<th scope="row">'.$row['f_id'].'</th>';
                            echo'<td>'.$row['f_content'].'</td>';
                            echo'<td>'.$row['stu_id'].'</td>';
                            echo'<td>';
                            echo'<form action="" method="POST" class="d-inline">
                                    <input type="hidden" name="id" value='.$row["f_id"].'>
                                    <button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>';
                        echo'</tr>';
                     } ?>
                    </tbody>
            </table>
            <?php }else{
                echo "There is no Feedback !...";
            }
            
            if(isset($_REQUEST['delete'])){
                $sql = "DELETE FROM feedback WHERE f_id ={$_REQUEST['id']}";
                if($conn->query($sql) == TRUE){
                    echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                }else{
                    echo'Unabale to delete Data!...';
                }
            }
            
            ?>
        </div>

<?php 
    include('../Admin/admininclude/footer.php');
 ?>