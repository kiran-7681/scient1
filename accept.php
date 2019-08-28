<?php 
 $rowid = $_GET['variable1'];
 $email = $_GET['variable2'];
  include 'config.php';
 $to = $email;
 $sub = "SCIENT REVIEW";
 $text ="Your project was accepted";
 $headers = "From: kiranraj.krk.1729@gmail.com";    
 mail($to,$sub,$text,$headers);
 header("location: welcome.php");

 $sql="INSERT INTO accprojects (username,mobile_number,email,s_username,s_description,id) SELECT username,mobile_number,email,s_username,s_description,id FROM projects WHERE id ='$rowid' ";
 if($link->query($sql) === TRUE){
  echo "added";
 } else{
  echo "error";
 }

 $sql = "DELETE FROM projects where id='$rowid'";
 if($link->query($sql) === TRUE){
  echo "deleted";
 } else{
  echo "error";
 }
?>