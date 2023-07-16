<?php
session_start();
?>
<html>
<head>
	<title>Student Attendance System</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<style>
		body{
			height: 100%;
			margin:0;
            padding:0;
            font-family: sans-serif;
            text-align: center;   
            font-size: 22px;  
            background-color: lightgray;    
            background-repeat: no-repeat;
            background-size: 100% 100%;    
		}
		form {
			padding: 200px;
		}

		input[type="text"], input[type="password"]{
         width: 70%;
         padding: 6px;
         box-sizing: border-box;
         border: 1px solid black;
		}
		input[type="submit"]{
			background-color: #0A2558; 
			border: solid; 
			padding: 14px 50px; 
			color: white; 
			border-radius: 4px;
		}
		input[type="checkbox"]{
              width: 15px;
              height: 15px;
		}

        tr, td {
          padding: 28px 40px;
          font-size: 22px;  
        }

        form i {
            margin-left: -30px;
            cursor: pointer;
        }
	</style>
</head>
<body>
<div class="Login">
 	<form method="post" >
 		<table border="1" align="center">
 		    <div class="Title">
 				<tr style="background-color: white;">
 					<td colspan="2">
 					   <h4>Student Attendance System & Faculty </h4><h4 align="center">Communication</h4>
 					</td>
 				</tr>
 		</div>
 			<div class="row">
 					<tr style="background-color: white;">
 						<td colspan="2">
 						Username: 
 						<input type="text" name="uname" required placeholder="Username" value="<?php if(isset($_COOKIE['Username'])){ echo $_COOKIE['Username']; } ?>" />
                    </td>
 					</tr>
 					<tr style="background-color: white;">
 						<td colspan="2">
 							Password: 
 						<input type="password" name="pwd" required placeholder="Password" id="password" value="<?php if(isset($_COOKIE['Password'])){ echo $_COOKIE['Password']; } ?>" /><i class="bi-eye-slash-fill" id="togglePassword"></i>
 						</td>
 					</tr>
 			</div>
 			<div class="rmbr">
 				<tr align="center" style="background-color: white;">
 					<td>		
 						<input type="checkbox" name="remember"> Remember me
 					<td>	    
 			         	<a href="forgotPassword.php">Forgot Password</a>
 			        </td>
 			        </tr>
 			</div>
 			    <tr style="background-color: white;"> 
 			        <td colspan="2" align="center">    
 			            <div class="sub">
 				            <input type="submit" name="login" value="Login">                     
 			            </div>
 					</td>
 				</tr>
 			</table>
 	</div>
 </form>
</body>
</html>
<?php

include_once ("Config.php");

if (isset($_POST['login'])) {
	$uname = $_POST['uname'];
	$pwd = $_POST['pwd'];

    $admin = mysqli_query($con, "SELECT * FROM admin_info");
    $pri = mysqli_query($con, "SELECT * FROM principal_info");
	$fac = mysqli_query($con, "SELECT * FROM faculty_info");
	$stu = mysqli_query($con, "SELECT * FROM student_info");
   
    while ($res = mysqli_fetch_array($admin)){
	    if ($uname == $res['A_Username'] && $pwd == $res['A_Password']) {
            $aid = $res['A_Id'];
            $_SESSION['aid'] = $aid;
	    	$_SESSION['admin'] = $uname; 
	    	if(isset($_SESSION["admin"])) {
                header("Location:adminDashboard.php");
            }
	    }
    }
    while ($res = mysqli_fetch_array($pri)){
    	if ($uname == $res['P_Username'] && $pwd == $res['P_Password']) {
            $pid = $res['P_Id'];
            $_SESSION['pid'] = $pid;
    		$_SESSION['principal'] = $uname; 
    		if(isset($_SESSION["principal"])) {
                header("Location:principalDashboard.php");
            }
    	}
    }
	while ($res = mysqli_fetch_array($fac)) {
		if ($uname == $res['F_Username'] && $pwd == $res['F_Password']) {
            $fid = $res['F_Id'];
            $_SESSION['fid'] = $fid;
		    $_SESSION['faculty'] = $uname; 
		    if(isset($_SESSION["faculty"])) {
                header("Location:facultyDashboard.php");
            }
	    }
	}

	while ($res = mysqli_fetch_array($stu)){
    	if ($uname == $res['S_Username'] && $pwd == $res['S_Password']) {
            $sid = $res['S_Id'];
            $_SESSION['sid'] = $sid;
    		$_SESSION['student'] = $uname; 
    		if(isset($_SESSION["student"])) {
                header("Location:studentdashboard.php");
            }
    	}
    }

    if (isset($_POST['remember'])) {
        setcookie("Username",$_POST['uname'],time()+(60*60*24*60));
        setcookie("Password",$_POST['pwd'],time()+(60*60*24*60));
    }

    
}

?>

<script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

</script>