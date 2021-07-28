<?php

include "layout/header.php";
$user_id =$_SESSION['user_id'];
if(isset($_GET['delete'])){

    $id = $_GET['delete'];
    $sqlDelCheckProject = "SELECT * FROM project WHERE project_id='$id' AND user_id='$user_id' ";
    $resultCheckDel = $conn->query($sqlDelCheckProject);
    $rowProject = $resultCheckDel->num_rows;
    if($rowProject>0){
        $dataCheckProject = $resultCheckDel->fetch_assoc();
        $file = $dataCheckProject['project_filename'];
        unlink("assets/file/".$file);
        $sqldelProject = "DELETE FROM project WHERE project_id ='$id'";
        if($conn->query($sqldelProject)===true){
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Succesfully Delete')
        window.location.href='Project.php';
            </SCRIPT>");
        }
    }else{
        echo "not valid";
    }


}


?>

<style>
    .k{
        width: 300px;
        height:100px;
        border: 1px black solid;
        
        margin-left: 50px;
        margin-right: 50px;
    }

    h3{
        text-align: center;
    }
</style>

<!-- Created
Read
Update / Delete -->

<div class="container">
    <br>
    <button class="btn btn-primary" type="button" onclick="window.location.href='project_add.php'">Add Project</button>
    <div class="row ">

        <div class="table-responsive">
            <table class="table">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title Project</th>
                        <th>View Project</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sqlProject = "SELECT * FROM project WHERE user_id ='$user_id' ";
                    $resultProject = $conn->query($sqlProject);
                    $i=0;
                    while($dataProject = $resultProject->fetch_assoc()){
                        $i++;
                    
                       
                    ?>
                    <tr>
                        <th><?=  $i ?></th>
                        <th><?=  $dataProject['project_name']?></th>
                        <th>
                            <button class="btn btn-success" type="button" onclick="window.location.href='assets/file/<?=  $dataProject['project_filename']?>'">View</button>
                        </th>
                        <th><?= date('h:i a d F Y', strtotime($dataProject['project_created'])) ?></th>
                        <th>
                            <button class="btn btn-warning" onclick="window.location.href='project_edit.php?id_edit=<?=  $dataProject['project_id'] ?>'">Edit</button>
                            <button class="btn btn-danger" onclick="window.location.href='project.php?delete=<?= $dataProject['project_id']  ?>'">Delete</button>
                        </th>
                    </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    
    


    </div>
    

</div>


<?php

include "layout/footer.php";

?>