<?php
	include "layout/header.php";
	$user_id =$_SESSION['user_id'];
	$id_edit = $_GET['id_edit'];
	$sqlProject = "SELECT * FROM project WHERE project_id='$id_edit' AND user_id='$user_id' ";
	$resultProject = $conn->query($sqlProject);
	
	$rowProject = $resultProject->num_rows;
	
	if($rowProject>0){
	    $dataProject = $resultProject->fetch_assoc();
	    $id_project = $dataProject['project_id'];
	
	
	}
	else{
	    echo ("<SCRIPT LANGUAGE='JavaScript'>
	        window.alert('Project Not Exist')
	        window.location.href='project.php';
	    </SCRIPT>");
	
	  
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
	<h1>Update Project</h1>
	<div class="row" >
		<div class="col-6">
			<form action="#" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">Name Project</label>
					<input class="form-control" type="text" name="name" value="<?= $dataProject['project_name'] ?>" >
				</div>
				<div class="form-group">
					<input class="btn btn-primary" type="submit" name="changename" value="Change Name Project" >
				</div>
			</form>
            <?php 
            
            
            
            
            ?>
		</div>
		<div class="col-6">
			<form action="#" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">File Project</label>
					<input class="form-control" type="file" name="fileproject">
				</div>
				<div class="form-group">
					<input class="btn btn-primary" type="submit" name="changefile" value="Change File Project" >
				</div>
			</form>
		</div>


		<?php 
			if(isset($_POST['changefile'])){
			    
			    $target_dir = "assets/file/";
			    $target_file = $target_dir . basename($_FILES["fileproject"]["name"]);
			    $uploadOk = 1;
			    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			
			
			
                // Check if file already exists
                if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
                }
                
                // Check file size
                if ($_FILES["fileproject"]["size"] > 1000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
                }
                
                
                
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                
                $temp = explode(".", $_FILES["fileproject"]["name"]);
                $newfilename = round(microtime(true)) . '.' . end($temp);
                    if (move_uploaded_file($_FILES["fileproject"]["tmp_name"], $target_dir . $newfilename)) {
                        echo "The file ". htmlspecialchars( basename( $_FILES["fileproject"]["name"])). " has been uploaded.";
                        
                        //coding upload dekat database
                        
                        //declare value
                        $projectname = $_POST['projectfullname'];
                        
                        
                        $datecreated = date("Y-m-d H:i:s");
                        $delFile = $dataProject['project_filename'];
                        unlink("assets/file/".$delFile );
                        //DECLARE command SQL
                        $sqlEditProject = "UPDATE project SET project_filename='$newfilename' WHERE project_id = '$id_project' AND user_id='$user_id'";
                        
                        //run sql
                        if($conn->query($sqlEditProject)===true){ 
                        
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                            window.alert('Succesfully Update File Project')
                            window.location.href='project.php';
                        </SCRIPT>");
                        
                        }
                        
                        
                        
                        
                        //$newfilename
                        } else {
                        echo "Sorry, there was an error uploading your file.";
                        }
                    }
			
			    
            }
			
			if(isset($_POST['changename'])){
        

                //declare value
                $name = $_POST['name'];
                
        
                //DECLARE command SQL
                $sqlEditProject = "UPDATE project SET project_name='$name' WHERE project_id = '$id_project' AND user_id='$user_id'";
        
                //run sql
                if($conn->query($sqlEditProject)===true){ 
        
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Succesfully Update Project')
                        window.location.href='project.php';
                    </SCRIPT>");
                }
            }
		?>
	</div>
</div>
<?php
	include "layout/footer.php";
     
	?>