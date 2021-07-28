<?php

include "layout/header.php";

$sqlEmployee = "SELECT * FROM user WHERE user_role='employee'";
$resultEmployee = $conn->query($sqlEmployee);
$rowEmployee = $resultEmployee->num_rows;


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
    <div class="row ">

        <div class="col-3 k bg-success" >

            <h2>Total Employee</h2>    
            <h3><?= $rowEmployee ?></h3>
            

        </div>
        <div class="col-3 k bg-info" >

            
            <h2>Total Project </h2>
            <h3>0</h3>

        </div>             

    </div>
    

</div>


<?php

include "layout/footer.php";

?>