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
    <h1>Add Project</h1>
    <div class="row" >
        <div class="col-12">  
    
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-6">
                        
                        <div class="form-group">
                            <label for="">Project Name</label>
                            <input class="form-control" type="text" name="projectfullname" placeholder="Please Enter Project Name" required>
                        </div>
                        
                    </div>

                </div>
                <div class="row">              
                    <div class="col-6">
                        <div class="form-group">
                            <label for="projectid">Project File</label>
                            <input class="form-control" type="file" name="projectfiled" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-6">
                        <div class="form-group">
                        
                            <input class="btn btn-primary" type="submit" name="addproject" value="Add Project">
                        </div>
                        
                    </div>

                </div>

            </form>
        </div>
    <?php 
    
    if(isset($_POST['addproject'])){
        
        $target_dir = "assets/file/";
$target_file = $target_dir . basename($_FILES["projectfiled"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["projectfiled"]["size"] > 1000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {

    $temp = explode(".", $_FILES["projectfiled"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
  if (move_uploaded_file($_FILES["projectfiled"]["tmp_name"], $target_dir . $newfilename)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["projectfiled"]["name"])). " has been uploaded.";

    //coding upload dekat database

//declare value
$projectname = $_POST['projectfullname'];
$id_user = $_SESSION['user_id'];

$datecreated = date("Y-m-d H:i:s");

//DECLARE command SQL
$sqlAddProject = "INSERT INTO project(project_name, project_filename, project_created, user_id) 
VALUES ('$projectname', '$newfilename', '$datecreated', '$id_user')";

//run sql
if($conn->query($sqlAddProject)===true){ 

echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Succesfully ADD Project')
        window.location.href='project.php';
    </SCRIPT>");

 }




    //$newfilename
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

        

    }
    
    
    ?>


    </div>
    

</div>


<?php

include "layout/footer.php";

?>