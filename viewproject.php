<?php
   session_start();

   if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
      header("location: login.php");
      exit;
   }
   include 'config.php';

   $username = $_SESSION['username'];
   $rowid = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Project</title>
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
        <a href="welcome.php" class="btn btn-success">Go Back</a><hr>
        <?php
           $sql = "SELECT * from projects where id='$rowid'";
           $result = $link->query($sql);
           if($result){
           	while ($row = $result->fetch_assoc()) { ?>
           		<h3>Contact Details</h3>
           		<p>Student Name:<b><?php echo $row["username"]; ?></b></p>
           		<p>Mobile Number:<b><?php echo $row["mobile_number"]; ?></b></p>
           		<p>Email ID:<b><?php echo $row["email"]; ?></p></b>
           		<h3>Project Details</h3>
           		<p>Project Name:<b><?php echo $row["s_username"]; ?></b></p>
           		<p>Project Details:<b><?php echo $row["s_description"]; ?></b></p>
           		<a class="btn btn-danger" href="delete.php?variable1=<?php echo $rowid; ?>&variable2=<?php echo $row['email']; ?>"><span class='glyphicon glyphicon-remove'>REJECT</span></a>
              <a class="btn btn-success" href="accept.php?variable1=<?php echo $rowid; ?>&variable2=<?php echo $row['email']; ?>"><span class='glyphicon glyphicon-ok'></span>ACCEPT</a>
             <?php }
            } 
            ?> 
    </div>  
  </div>
</body>
</html>
