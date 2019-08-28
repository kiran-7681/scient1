 <?php 
 $username = $_GET['variable1'];
 include 'config.php';
 header("location: admin.php");
 
 $sql = "DELETE FROM users where username='$username'";
 if($link->query($sql) === TRUE){
  echo "deleted";
 } else{
  echo "error";
 }
?>