<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
include 'config.php';
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style type="text/css">
      .head1{
            display: inline-block;
            margin-left: 40px;
        }
        .head2{
            display: inline-block;
            margin-left: 100px;
        }
        .logo{ 
            float: right;
        }
        .page-header {
          background-color: #e6ac00;
          padding: 10px;
        }
        .page-header a{
          margin-left: 1000px;
          text-decoration: none;
          padding: 5px;
          background-color: #4caf50;
          border-radius: 10px;
        }
        .btn1{
          position: absolute;
          top: 34%;
        }
        .btn2{
          position: absolute;
          top: 40%;
        }
        .active{
          margin-left: 500px;
          text-decoration: none;
          padding: 10px;
          color: black;
        }
        .wrapper{
          position: absolute;
            top: 80%;
            left:50%;
            transform: translate(-50%,-50%);
            width:450px;
            padding:40px;
            background: #e6ac00;
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0,0,0,.5);
            border-radius: 10px;
            text-align: center;
        }
        th{
          text-align: center;
          background-color: white;
          color: black;
        }
        td{
          background-color: cornsilk;
        }
    </style>
</head>
<body>
  <span class="inline">
        <img src="scient-logo.jpg" width="125px;">
        <h3 class="head1">Student Centre For Innovation<br> in Engineering and Technology</h3>
        <h3 class="head2"><strong>National Institute of Technology<br>Tiruchirappalli</strong></h3>
        <img class="logo" src="nitt-logo.jpg" width="125px;">
    </span><hr>
  <div>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>
    <p>
        <a class="btn1" href="reset-password.php" class="btn btn-warning">Reset Password</a>
        <a class="btn2" href="logout.php" class="btn btn-danger">Sign Out</a>
    </p></div><hr>
    <div class="view">
    <a class="active" href="activeprojects.php" title="click here">VIEW ACTIVE PROJECTS</a>
  </div><hr>
    <div class="wrapper">
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
                                <td><a href="viewproject.php?id=<?php echo $row["id"]; ?>"><?php echo $row["s_username"]; ?></a></td>
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