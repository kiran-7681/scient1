 <?php 
 $rowid = $_GET['variable1'];
 $email = $_GET['variable2'];
 include 'config.php';
 $to = $email;
 $sub = "SCIENT REVIEW";
 $text ="Your project was rejected";
 $headers = "From: kiranraj.krk.1729@gmail.com";    
 mail($to,$sub,$text,$headers); 
 header("location: welcome.php");
 
 $sql = "DELETE FROM projects where id='$rowid'";
 if($link->query($sql) === TRUE){
  echo "deleted";
 } else{
  echo "error";
 }
?>