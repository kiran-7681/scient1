<?php
   session_start();

   include 'config.php';

   $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
</head>
<body>
	<div class="wrapper">
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    <div class="content">
        <?php 
        $sql = "SELECT * FROM users where status ='0'";
        $result=$link->query($sql);
        if($result->num_rows > 0){ ?>

        <table border="1" class="col-4">
                <thead>
                        <th>Sl.No</th>
                        <th>Admin Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                </thead>
                <tbody>
                        <?php
                          if($result) {
                                $i=1;
                                while($row = $result->fetch_assoc()) {?>
                                        <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['username'];?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><a class="btn btn-danger" href="deleteadmin.php?variable1=<?php echo $row['username']; ?>"><span class='glyphicon glyphicon-remove'>DELETE</span></a>
                                        </tr>
                                        <?php $i++;
                                }?>
                          <?php }?>
                </tbody>
        </table>
        <?php } else{
               echo "<p class='lead'><em>No admin records were found.</em></p>";
         } ?>
    </div>  
    <div class="view">
    <a href="activeprojectsa.php" title="click here">VIEW ACTIVE PROJECTS</a>
  </div><hr>
    <div class="projects">
        <h2>Projects under review</h2>
        <h3>Click the corresponding project name for more info</h3>
        <?php
           $sql = "SELECT * from projects";
           $result = $link->query($sql); 

           if($result->num_rows > 0){ ?>
           <table border="1">
               <thead>
                   <th>Sl.No</th>
                   <th>Name</th>
                   <th>Project Name</th>
               </thead>
               <tbody>
                   <?php
                     if($result) {
                        $i=1;
                        while ($row = $result->fetch_assoc()) {?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row["username"]; ?></td>
                                <td><a href="viewprojecta.php?id=<?php echo $row["id"]; ?>"><?php echo $row["s_username"]; ?></a></td>
                            </tr>
                        <?php $i++; } ?>
                     <?php } ?>
               </tbody>
           </table>
         <?php } else{
               echo "<p class='lead'><em>No records were found.</em></p>";
         } ?>
    </div>
  </div>
</body>
</html>