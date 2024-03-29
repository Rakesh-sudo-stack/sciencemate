<?php
session_start();
include './connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='./img/logo.png' rel='icon' type='image/x-icon'/>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #fff;
	background: #3598dc;
}
.form-control {
	min-height: 41px;
	background: #f2f2f2;
	box-shadow: none !important;
	border: transparent;
}
.form-control:focus {
	background: #e2e2e2;
}
.form-control, .btn {        
	border-radius: 2px;
}
.login-form {
	width: 350px;
	margin: 30px auto;
	text-align: center;
}
.login-form h2 {
	margin: 10px 0 25px;
}
.login-form form {
	color: #7a7a7a;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.login-form .btn {        
	font-size: 16px;
	font-weight: bold;
	background: #3598dc;
	border: none;
	outline: none !important;
}
.login-form .btn:hover, .login-form .btn:focus {
	background: #2389cd;
}
.login-form a {
	color: #fff;
	text-decoration: underline;
}
.login-form a:hover {
	text-decoration: none;
}
.login-form form a {
	color: #7a7a7a;
	text-decoration: none;
}
.login-form form a:hover {
	text-decoration: underline;
}
</style>
</head>
<body>
<div class="login-form">
    <form action="" method="post">
        <h2 class="text-center">Reset</h2>   
        <div class="form-group has-error">
        	<input type="password" class="form-control" name="password" placeholder="New Password" required="required" value="">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="c_password" placeholder="Confirm Password" required="required" value="">
			
        </div>     
        <div class="form-group">
            <button name="reset" type="submit" class="btn btn-primary btn-lg btn-block">Reset</button>
			
        </div>
        
    </form>
    <p class="text-center small">Don't have an account? <a href="signup.php">Sign up here!</a></p>
</div>
</body>
</html>
<?php
if(isset($_POST['reset'])){
    if(isset($_GET['token'])){
        $token = $_GET['token'];
        $pass = mysqli_real_escape_string($con,$_POST['password']);
        $cpass = mysqli_real_escape_string($con,$_POST['c_password']);

        if($pass == $cpass){
            $hashedpass = password_hash($pass,PASSWORD_BCRYPT);
            $updatepass = " UPDATE `userslist` SET `password`='$hashedpass' WHERE token='$token' ";

            $query = mysqli_query($con,$updatepass);
            if($query){
                ?>
                <script>
                    alert("Password updated!!!");
                    location.replace("login.php");
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("Password not updated!!!");
                </script>
                <?php
            }
        }else{
            ?>
            <script>
                alert("Passwords not matching")
            </script>
            <?php
        }
    }
}
?>