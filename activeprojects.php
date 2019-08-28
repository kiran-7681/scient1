<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
        <title></title>
</head>
<body>
        <div class="wrapper">
        <a href="welcome.php" class="btn btn-danger">Go Back</a><hr>
        <h3>Active Projects</h3><hr>    
        <?php 
        $sql = "SELECT * FROM accprojects";
        $result=$link->query($sql);
        if($result->num_rows > 0){ ?>

        <table border="1" class="col-4">
                <thead>
                        <th>Sl.No</th>
                        <th>Name</th>
                        <th>Project Name</th>
                        <th>Project Description</th>
                </thead>
                <tbody>
                        <?php
                          if($result) {
                                $i=1;
                                while($row = $result->fetch_assoc()) {?>
                                        <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['username'];?></td>
                                                <td><?php echo $row['s_username']; ?></td>
                                                <td><?php echo $row['s_description']; ?></td>
                                        </tr>
                                        <?php $i++;
                                }?>
                          <?php }?>
                </tbody>
        </table>
        <?php } else{
               echo "<p class='lead'><em>No records were found.</em></p>";
         } ?>
 </div>
</body>
</html>