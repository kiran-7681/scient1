<?php 

session_start();
require_once "config.php";

$username = $email = $password = $confirm_password = "";
$username_err = $email_err = $password_err = $confirm_password_err = "";

if(isset($_POST['reg_user'])) {
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }         
        mysqli_stmt_close($stmt);
    }

    if(empty(trim($_POST["email"]))){
        $email_err = "* Please enter an email id.";
    } else{
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            $param_email = trim($_POST["email"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "* This email id is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "* Oops! Something went wrong. Please try again later.";
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    if(empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        
        $sql = "INSERT INTO users (username, email, password,status) VALUES (?, ?, ?,'false')";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);
            
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}


$lusername = $lpassword = "";
$lusername_err = $lpassword_err = "";
 
if(isset($_POST['login_user'])) {
 
    if(empty(trim($_POST["username"]))){
        $lusername_err = "Please enter username.";
    } else{
        $lusername = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $lpassword_err = "Please enter your password.";
    } else{
        $lpassword = trim($_POST["password"]);
    }
    
    if(empty($lusername_err) && empty($lpassword_err)){
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $lusername;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $lusername, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($lpassword, $hashed_password)){
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $lusername;   
                            $sql="SELECT status FROM users WHERE username= '$lusername'";
                            $result=$link->query($sql);
                            if ($result) {
                               $aresult=$result->fetch_assoc();

                                                                            
                            if ($aresult['status']==true) {
                              header("location:admin.php");  
                            }
                            else{
                            header("location: welcome.php"); 
                        }
                        } } else{
                            $lpassword_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    $lusername_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($link);
}

$s_username = $s_email = $s_number = $s_pname = $s_pdesc = "";
$s_username_err = $s_email_err = $s_number_err = $s_pname_err = $s_pdesc_err = "";

if(isset($_POST['p_submit'])) {
	
	if(empty(trim($_POST["user_name"]))){
        $s_username_err = "Please enter a username.";
    } else{
        $sql = "SELECT id FROM projects WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["user_name"]);
            
            if(mysqli_stmt_execute($stmt)){
                $s_username = trim($_POST["user_name"]);    
            } 
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }

    if(empty(trim($_POST["mob_no"]))) {
    	$s_number_err = "Please enter a mobile number.";
    }else if(!filter_var($_POST["mob_no"],FILTER_VALIDATE_INT)){
    	$s_number_err = "It is not a number";
    }else if(strlen(trim($_POST["mob_no"]))!=10) {
    	$s_number_err="number must have 10 digits";
    }else{
    	$sql = "SELECT id from projects where mobile_number = ?";

    	if($stmt = mysqli_prepare($link,$sql)){
    		mysqli_stmt_bind_param($stmt, "s", $param_mobile);
    		$param_mobile = trim($_POST["mob_no"]);

    		if(mysqli_stmt_execute($stmt)) {
    			$s_number = trim($_POST["mob_no"]);
    		}
    		else{
    			echo "Oops! Something went wrong. Please try again later";
    		}
    	}
    	mysqli_stmt_close($stmt);
    }

    if(empty(trim($_POST["p_email"]))){
        $s_email_err = "* Please enter an email id.";
    }else if(!filter_var($_POST["p_email"], FILTER_VALIDATE_EMAIL)){
    	$s_email_err = "invalid email format";
    } 
    else{
        $sql = "SELECT id FROM projects WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_email);           
            $param_email = trim($_POST["p_email"]);
            
            if(mysqli_stmt_execute($stmt)){
            	$s_email = trim($_POST["p_email"]);                
            } 
            else{
                echo "* Oops! Something went wrong. Please try again later.";
            }
        }
         
        mysqli_stmt_close($stmt);
    }

    if(empty(trim($_POST["p_name"]))){
        $s_pname_err = "Please enter the project name.";
    } else{
        $sql = "SELECT id FROM projects WHERE s_username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_pname);
            $param_pname = trim($_POST["p_name"]);
            
            if(mysqli_stmt_execute($stmt)){
                $s_pname = trim($_POST["p_name"]);    
            } 
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }

    if(empty(trim($_POST["p_desc"]))){
        $s_pdesc_err = "Please enter the project description.";
    } else{
        $sql = "SELECT id FROM projects WHERE s_description = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_pdesc);
            $param_username = trim($_POST["p_desc"]);
            
            if(mysqli_stmt_execute($stmt)){
                $s_pdesc = trim($_POST["p_desc"]);    
            } 
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }

    if(empty($s_username_err) && empty($s_email_err) && empty($s_number_err) && empty($s_pname_err) && empty($s_pdesc_err)) {
        
        $sql = "INSERT INTO projects (username, mobile_number, email, s_username, s_description) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_mobile, $param_email, $param_pname, $param_pdesc);
            
            $param_username = $s_username;
            $param_mobile = $s_number;
            $param_email = $s_email;
            $param_pname = $s_pname;
            $param_pdesc = $s_pdesc;
            
            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}

?>