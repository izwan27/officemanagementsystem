<?php

include "layout/header.php";
if(isset($_GET['delete'])){

    $id = $_GET['delete'];
    $sqldelEmp = "DELETE FROM user WHERE user_id ='$id'";
    if($conn->query($sqldelEmp)===true){
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Delete')
    window.location.href='employee.php';
        </SCRIPT>");
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

<div class="container">
    <br>
    <button class="btn btn-primary" type="button" onclick="window.location.href='employee_add.php'">Add Employee</button>
    <div class="row ">

        <div class="table-responsive">
            <table class="table">

                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sqlEmployee = "SELECT * FROM user WHERE user_role ='employee' ";
                    $resultEmployee = $conn->query($sqlEmployee);

                    while($dataEmployee = $resultEmployee->fetch_assoc()){
                        
                    
                       
                    ?>
                    <tr>
                        <th><?=  $dataEmployee['user_name']?></th>
                        <th><?=  $dataEmployee['user_username']?></th>
                        <th><?= date('h:i a d F Y', strtotime($dataEmployee['user_created'])) ?></th>
                        <th>
                            <button class="btn btn-warning" onclick="window.location.href='employee_edit.php?id_edit=<?=  $dataEmployee['user_id'] ?>'">Edit</button>
                            <button class="btn btn-danger" onclick="window.location.href='employee.php?delete=<?= $dataEmployee['user_id']  ?>'">Delete</button>
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