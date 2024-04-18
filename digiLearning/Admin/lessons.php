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

<div class="col-sm-9 mt-5 mx-3">
        <form action="" class="mt-3 form-inline d-print-none">
            <div class="form-group mr-3">
                <label for="cheakid">Enter Course ID: </label>
                <input type="text" class="form-control ml-3" id="cheakid" name="cheakid">
            </div>
            <button type="submit" class="btn btn-danger">Search</button>
        </form>

    <?php 
        $sql ="SELECT course_id FROM course";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            if(isset($_REQUEST['cheakid']) && $_REQUEST['cheakid'] == $row['course_id']){
                $sql ="SELECT * FROM course WHERE course_id ={$_REQUEST['cheakid']}";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                if(($row['course_id']) == $_REQUEST['cheakid']){
                    $_SESSION['course_id'] = $row['course_id'];
                    $_SESSION['course_name'] = $row['course_name'];
                    ?>
        <h3 class="mt-5 bg-dark text-white p-2">Course ID: <?php if(isset($row['course_id'])){echo $row['course_id'];} ?> 
        Course Name: <?php if(isset($row['course_name'])){echo $row['course_name'];} ?></h3>
    <?php
        $sql = "SELECT * FROM lesson WHERE course_id = {$_REQUEST['cheakid']}";
        $result = $conn->query($sql);
        echo'<table class="table">
        <thead>
            <tr>
                <th scope="col">Lesson ID</th>
                <th scope="col">Lesson Name</th>
                <th scope="col">Lesson Link</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>';
            while($row =$result->fetch_assoc()){ 
                    echo'<tr>';
                    echo'<th scope="row">'.$row['lesson_id'].'</th>';
                    echo'<td>'.$row['lesson_name'].'</td>';
                    echo'<td>'.$row['lesson_link'].'</td>';
                    echo'<td>';
                    echo'<form action="editlesson.php" method="POST" class="d-inline">
                        <input type="hidden" name="id" value='.$row["lesson_id"].'>
                        <button type="submit" class="btn btn-info mr-3" name="view" value="view"><i class="fa-solid fa-pen"></i></button>
                        </form>';

                        echo'<form action="" method="POST" class="d-inline">
                        <input type="hidden" name="id" value='.$row["lesson_id"].'>
                        <button type="submit" class="btn btn-secondary" name="delete" value="delete"><i class="far fa-trash-alt"></i></button>
                    </form>
                    </td>
                    </tr>';
            }
        echo'</tbody>
            </table>';  
      }else{
        echo'<div class="alert alert-dark mt-4" role="alert">Course Not Found ! </div>';
      }
      if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM lesson WHERE lesson_id ={$_REQUEST['id']}";
        if($conn->query($sql) == TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
        }else{
            echo'Unabale to delete Data!...';
        }
    }
    }
  }
    ?>
</div>

<?php 
if(isset($_SESSION['course_id'])){
echo'<div>
<a class="btn btn-danger box" href="./addLesson.php"><i class="fas fa-plus fa-2x"></i></a>
</div>';
}
?>

<?php 
    include('../Admin/admininclude/footer.php');
 ?>