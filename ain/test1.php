<?php


include "config/db.php";

?>

<!DOCTYPE html>
<html>
<body>


<?php


$sqlP = "SELECT
 project.project_id, 
 project.project_name, 
 project.project_filename, 
 project.project_created, 
 user.user_name  
                            FROM project 
                                        JOIN user ON user.user_id = project.user_id ";

$resultProject = $conn->query($sqlP);



?>


<table>
    <tr>
        <th>ID</th>
        <th>Project Name</th>
        <th>Project Created</th>
        <th>By </th>
        <th>View File</th>
    </tr>
    <?php
    
    while($dataProject=$resultProject->fetch_assoc()){?>
    <tr>
        <th><?= $dataProject['project_id'] ?></th>
        <th><?= $dataProject['project_name'] ?></th>
        <th><?= date('h:i a d F Y', strtotime($dataProject['project_created']))  ?></th>
        <th><?= $dataProject['user_name'] ?></th>
        <th><button onclick="window.location.href='assets/file/<?= $dataProject['project_filename'] ?>'">View</button></th>
    </tr>
    <?php } ?>
</table>

<form action="test.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>