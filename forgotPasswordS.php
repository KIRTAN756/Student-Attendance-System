<?php
session_start();
include_once ("Config.php");
?>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<style>
	body{
		background-color: lightgray;
	}
	table{
		background-color: white;
	}
	.link{
		text-decoration: none;
	}
</style>
<form method="post">
	<table border="1" class="table1">
		<tr class="bgheading">
            <td style="width: 30%;" colspan="4">
                <h2 class="heading">Forgot Password</h2>
            </td>
        </tr>
		<tr align="center">
			<td>
				<a href="forgotPasswordA.php" class="button link">Admin</a>
			</td>
			<td>
				<a href="forgotPasswordP.php" class="button link">Principal</a>
			</td>
			<td>
				<a href="forgotPasswordF.php" class="button link">Faculty</a>
			</td>
			<td>
				<a href="forgotPasswordS.php" class="button link">Student</a>
			</td>
		</tr>
		<tr>
        	<td align="center" colspan="4">
        		<table class="table3">
        			<tr>
        				<td>
        					Full Name:
        				</td>
        				<td>
        					<input type="text" name="fname" placeholder="Full Name" required class="w3-input">
        				</td>
        				<td>
        					Roll No:
        				</td>
        				<td>
        					<input type="text" name="rollNo" placeholder="Roll No" required class="w3-input">
        				</td>
        			</tr>
        			<tr>
        				<td>
        					Standard:
        				</td>
        				<td>
        					<input type="text" name="standard" placeholder="Standard" required class="w3-input">
        				</td>
        				<td>
        					Division:
        				</td>
        				<td>
        					<input type="text" name="division" placeholder="Division" required class="w3-input">
        				</td>
        			</tr>
        			<tr>
        				<td>
        					Security Question:
        				</td>
        				<td>
        					<select name="question" class="w3-input">
                                <option selected disabled>--</option>
                                <option value="What is the name of your First Pet?">What is the name of your First Pet?</option>
                                <option value="What is the name of your First School?">What is the name of your First School?</option>
                                <option value="Who is your favourite Actor?">Who is your favourite Actor?</option>
                                <option value="What is your favourite Book?">What is your favourite Book?</option>
                                <option value="What city were you born in?">What city were you born in?</option>
                            </select>
        				</td>
        				<td>
        					Answer:
        				</td>
        				<td>
        					<input type="text" name="answer" placeholder="Answer" required class="w3-input">
        				</td>
        			</tr>
        			<tr>
        				<td colspan="4" align="center">
                            <button type="submit" name="find" class="button">Find Password</button>
                        </td>
        			</tr>
        		</table>
        	</td>
        </tr>
        <?php

			if (isset($_POST['find'])) {

				$fullName = $_POST['fname'];
				$rollNo = $_POST['rollNo'];
				$standard = $_POST['standard'];
				$division = $_POST['division'];
				$question = $_POST['question'];
				$answer = $_POST['answer'];

				$result = mysqli_query($con, "SELECT S_Password FROM student_info WHERE S_Name = '$fullName' AND S_RollNo = '$rollNo' AND S_Standard = '$standard' AND S_Division = '$division' AND Security_Question = '$question' AND Security_Answer = '$answer' ");

				while ($res = mysqli_fetch_array($result)) {
					if($res){
                        $_SESSION['status']="Password: ".$res['S_Password'];
                        $_SESSION['status_code']="success";
                    }
                    else{
                        $_SESSION['status']="data is not inserted";
                        $_SESSION['status_code']="error";
                    }
				}
			}
		?>
		<tr align="center">
			<td colspan="4">
				<a href="index.php" class="button link">Close</a>
			</td>
		</tr>
	</table>
</form>

<script src="alert.min.js"></script>
<?php
if(isset($_SESSION['status']))
{
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['status']; ?>",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            button: "ok done!",
        });
    </script>
    <?php
        unset($_SESSION['status']);
    }
?>