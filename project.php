<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
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
        .project{
        	position: absolute;
            top: 70%;
            left:50%;
            transform: translate(-50%,-50%);
            width:450px;
            padding:40px;
            background: #e6ac00;
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0,0,0,.5);
            border-radius: 10px;
        }
        input,textarea{
        	background: none;
        	text-align: center;
        	margin-bottom: 5px;
        	padding: 10px;
        	margin-left: 70px;
        	border-radius: 15px;
        	border: 1px solid black;
        }
        input[type="submit"]{
        	background: #03a9f4;
        	cursor: pointer;
        	margin-left: 130px;
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
	<div class="project">
        <h2>Unleash your Ideas(Students)</h2>
        <form action="login.php" method="post">
            <div class="p-group">
                <input type="text" id="name" name="user_name" placeholder="Student Name">
                <div class="p-help"><?php echo $s_username_err; ?></div>
            </div>
            <div class="p-group">
                <input type="text" id="number" name="mob_no" placeholder="Mobile Number">
                <div class="p-help"><?php echo $s_number_err; ?></div>
            </div>
            <div class="p-group">
                <input type="text" id="Email" name="p_email" placeholder="Email Id">
                <div class="p-help"><?php echo $s_email_err; ?></div>
            </div>
            <div class="p-group">
                <input type="text" id="pname" name="p_name" placeholder="Project Name">
                <div class="p-help"><?php echo $s_pname_err; ?></div>
            </div>
            <div class="p-group">
                <textarea id="pdesc" name="p_desc" placeholder="Project Description"></textarea>
                <div class="p-help"><?php echo $s_pdesc_err; ?></div>
            </div>
            <div class="p-group">
                <input type="submit" name="p_submit" value="Submit">
                <div class="p-help"></div>
            </div>
        </form>
    </div>
</body>
</html>