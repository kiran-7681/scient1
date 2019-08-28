<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-uhut8PejFZO8994oEgm/ZfAv0mW1/b83nczZzSwElbeILxwkN491YQXsCFTE6+nx" crossorigin="anonymous">
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
        .inline{
        }
        .navbar{
            background-color: #e6ac00;
        }
        .navbar h2{
            color: white;
        }
        .link{
            text-align: center;
            font-size: 20px;
        }
        .form-control{
            background: none;
            text-align: center;
            color: black;
            border: 1px solid black;
        }
        .about{
            text-align: center;
        }
        .project{
            position: absolute;
            text-align: center;
            left: 55%;
            top: 70%;
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
    <div class="navbar">
        <h2>Admin Login</h2>
        <form action="login.php" method="post">
            <div class="form-inline my-2 my-lg-0">
            <div class="form-group <?php echo (!empty($lusername_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="username" class="form-control mr-sm-2" placeholder="username" value="<?php echo $lusername; ?>">
                <div class="help-block"><?php echo $lusername_err; ?></div>
            </div>    
            <div class="form-group <?php echo (!empty($lpassword_err)) ? 'has-error' : ''; ?>">
                <input type="password" name="password" class="form-control" placeholder="password">
                <div class="help-block"><?php echo $lpassword_err; ?></div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="login_user" value="Login">
            </div>
        </div><br>
            <p class="link">Admin sign up:<a href="register.php">Sign up</a>.</p>
        </form>
    </div> <br><br>
    <div class="about" style="max-width: 500px;">
        <h3><strong>About Us</strong></h3>
        <p>SCIEnT is a multi-disciplinary innovation centre, providing opportunities to students to delve into the ever expanding world of technology, and discover, hands on, the incredible scope for innovation that the world offers today. The lab allows students to explore and experiment with technology, without having to deal with the fear and cost of failure. At SCIEnT, students are offered a multitude of tools, machines, consumables and services, and a space in which to work, learn and grow.</p>
    </div>
    <div class="project">
        <p>Do u want to submit your own project?? If yes, click the link below</p>
        <a href="project.php">CLICK HERE</a>
    </div>
</body>
</html>