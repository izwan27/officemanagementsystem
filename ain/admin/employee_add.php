<?php

include "layout/header.php";

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
    <h1>Add Employee</h1>
    <div class="row" >
        <div class="col-12">  
    
            <form action="#" method="POST">
                <div class="row">

                    <div class="col-6">
                        
                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input class="form-control" type="text" name="fullname" placeholder="Please ENter Full NAme" required>
                        </div>
                        
                    </div>

                </div>
                <div class="row">
                
                    <div class="col-3">

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" name="username" required>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="passweord">Password</label>
                            <input class="form-control" type="Password" name="pass" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-6">
                        <div class="form-group">
                        
                            <input class="btn btn-primary" type="submit" name="addemployee" value="Add Employee">
                        </div>
                        
                    </div>

                </div>

            </form>
        </div>
    <?php 
    
    if(isset($_POST['addemployee'])){
        

        //declare value
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $role = "employee";
        $status="1";
        $datecreated = date("Y-m-d H:i:s");

        //DECLARE command SQL
        $sqlAddEmployee = "INSERT INTO user(user_name, user_username, user_password, user_role, user_status, user_created) 
        VALUES ('$fullname','$username','$pass','$role','$status','$datecreated')";

        //run sql
        if($conn->query($sqlAddEmployee)===true){ 

        echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Succesfully ADD eMPLOYEE')
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