<?php

include "layout/header.php";

$id = $_GET['id_edit'];
$sqlEmp = "SELECT * FROM user WHERE user_id='$id'";
$resultEmp = $conn->query($sqlEmp);
$dataEmp = $resultEmp->fetch_assoc();

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
    <h1>eDIT Employee</h1>
    <div class="row" >
        <div class="col-12">  
    
            <form action="#" method="POST">
                <div class="row">

                    <div class="col-6">
                        
                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input hidden type="text" name="id_edit" value="<?= $id ?>">
                            <input class="form-control" type="text" name="fullname" placeholder="Please ENter Full NAme" value="<?= $dataEmp['user_name']?>" required>
                        </div>
                        
                    </div>

                </div>
                <div class="row">
                
                    <div class="col-3">

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" name="username" value="<?= $dataEmp['user_username']?>" required>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="passweord">Password</label>
                            <input class="form-control" type="Password" name="pass" value="<?= $dataEmp['user_password']?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-6">
                        <div class="form-group">
                        
                            <input class="btn btn-primary" type="submit" name="editemployee" value="Update Employee">
                        </div>
                        
                    </div>

                </div>

            </form>
        </div>
    <?php 
    
    if(isset($_POST['editemployee'])){
        

        //declare value
        $id_edit = $_POST['id_edit'];
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];

        //DECLARE command SQL
        $sqlAddEmployee = "UPDATE user SET user_name='$fullname', user_username='$username', user_password='$pass'  WHERE user_id='$id_edit'";

        //run sql
        if($conn->query($sqlAddEmployee)===true){ 

        echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Succesfully Update Employee')
                window.location.href='employee.php';
            </SCRIPT>");

         }

    }
    
    
    ?>


    </div>
    

</div>


<?php

include "layout/footer.php";

?>