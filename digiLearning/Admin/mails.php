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
            <p class="bg-dark text-white p-2">List of Mails <i class="fa-solid fa-envelope"></i></p>
            <?php 
                $sql= "SELECT * FROM contact";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
            ?>
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Student Email</th>
                            <th scope="col">About</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php while($row =$result->fetch_assoc()){ 
                        echo'<tr>';
                            echo'<th scope="row">'.$row['name'].'</th>';
                            echo'<td>'.$row['subject'].'</td>';
                            echo'<td>'.$row['email'].'</td>';
                            echo'<td>'.$row['about'].'</td>';
                            echo'<td>';
                            echo'<form action="" method="POST" class="d-inline">
                                    <input type="hidden" name="id" value='.$row["c_id"].'>
                                    <button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>';
                        echo'</tr>';
                     } ?>
                    </tbody>
            </table>
            <?php }else{
                echo "There is no Mails !...";
            }
            
            if(isset($_REQUEST['delete'])){
                $sql = "DELETE FROM contact WHERE c_id ={$_REQUEST['id']}";
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