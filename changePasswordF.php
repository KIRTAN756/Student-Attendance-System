<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<?php
include 'facultyDashboard.php';
?>
<div class="home-content">
	<form method="post" action="<?php $_PHP_SELF ?>">
		<table border="1" class="table1">
			<tr class="bgheading">
				<td style="width: 30%;">
                    <h2 class="heading">Change Password</h2>
                </td>
			</tr>
			<tr>
				<td>
					<table class="table3">
						<tr>
							<td>
								Current Password:
							</td>
							<td>
								<input type="password" name="cpassword" class="w3-input" required placeholder="Current Password">
							</td>
						</tr>
						<tr>
							<td>
								New Password:
							</td>
							<td>
								<input type="password" name="npassword" class="w3-input" required placeholder="New Password">
							</td>
						</tr>
						<tr>
							<td>
								Confirm New Password:
							</td>
							<td>
								<input type="password" name="cnpassword" class="w3-input" required placeholder="Confirm">
							</td>
						</tr>
						<tr>							
							<td>
								<button type="submit" name="update" class="button">Update Password</button>
							</td>
							<td align="center">
                            	<button type="submit" name="cancel" class="button" formaction="manageAccountF.php">Cancel</button>
                        	</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</form>
</div>

<?php

include_once ("Config.php");

if (isset($_POST['update'])) {

	$fid = $_GET['id'];
	$cpassword = $_POST['cpassword'];
	$npassword = $_POST['npassword'];
	$cnpassword = $_POST['cnpassword'];

	$result = mysqli_query($con,"SELECT * FROM faculty_info WHERE F_Id = '$fid'");

	while ($res = mysqli_fetch_array($result)) {
		if ($cpassword == $res['F_Password']) {
			if ($npassword == $cnpassword) {
				$record = "UPDATE faculty_info SET F_Password = '$npassword' WHERE F_Id = '$fid'";

				if (mysqli_query($con, $record)) {
					
				}
				if($record){
        			$_SESSION['status']="Password Updated";
        			$_SESSION['status_code']="success";
    			}
    			else{
        			$_SESSION['status']="data is not inserted";
        			$_SESSION['status_code']="error";
    			}
			}
			else{
				echo "New Password and Confirm Password Are not Matched";
			}
		}
		else{
			echo "Current Password is not Matched";
		}
	}
}

?>

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
