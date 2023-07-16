<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<?php
include 'principalDashboard.php';
?>
<style>
	.size{
		font-size: 48px;
	}
	.link{
		text-decoration: none;
		font-family: 'Poppins', sans-serif;
	}
	.button{
      background-color:#0A2558 ; 
      border: solid; 
      padding: 14px 50px; 
      color: white; 
      border-radius: 4px;
      cursor: pointer;
    }
</style>

<div class="home-content">
	<form method="post" action="<?php $_PHP_SELF ?>">
		<table border="1" class="table1">
			<tr class="bgheading">
                <td style="width: 30%;">
                    <h2 class="heading">Edit</h2>
                </td>
            </tr>
        <tr>
        	<td>
        		<table class="table3">
        			
        				<?php

        				include_once ("Config.php");

        				$pid = $_SESSION['pid'];

        				$result = mysqli_query($con,"SELECT * FROM principal_info WHERE P_Id = '$pid' ");

        				while ($res = mysqli_fetch_array($result)) {
        					echo "<tr>";
        					echo "<td align='center'><i class='bi-person-circle size'></i></td>";
        					echo "<td align='left'><h2>".$res['P_Name']."</h2></td>";		
        				?>
        				</td>
        			</tr>
                    <tr>
                    	<td>
                    		Full Name:
                    	</td>
                    	<td>
                    		<input type="text" name="pname" value="<?php echo $res['P_Name']; ?>" class="w3-input" required>
                    	</td>
                    	<td>
                    		Date of Birth:
                    	</td>
                    	<td>
                    		<input type="date" name="pdob" value="<?php echo $res['P_Dob']; ?>" class="w3-input" required>
                    	</td>
                    </tr>
                    <tr>
                    	<td>
                    		Email:
                    	</td>
                    	<td>
                    		<input type="email" name="mail" value="<?php echo $res['P_Email']; ?>" class="w3-input" required>
                    	</td>
                    	<td>
                    		Mobile No:
                    	</td>
                    	<td>
                    		<input type="number" name="pmono" value="<?php echo $res['P_MobileNo']; ?>" class="w3-input" required>
                    	</td>
                    </tr>
                    <tr>
                    	<td>
                    		Address:
                    	</td>
                    	<td colspan="3">
                    		 <textarea name="address" style="height: 70px" class="w3-input" placeholder="Address" required><?php echo $res['P_Address']; ?></textarea>
                    	</td>
                    </tr>
                    <tr>
                        <td>
                            Security Question:
                        </td>
                        <td colspan="3">
                            <select name="question" class="w3-input">
                                <option selected value="<?php echo $res['Security_Question']; ?>"><?php echo $res['Security_Question']; ?></option>
                                <option value="What is the name of your First Pet?">What is the name of your First Pet?</option>
                                <option value="What is the name of your First School?">What is the name of your First School?</option>
                                <option value="Who is your favourite Actor?">Who is your favourite Actor?</option>
                                <option value="What is your favourite Book?">What is your favourite Book?</option>
                                <option value="What city were you born in?">What city were you born in?</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Answer:
                        </td>
                        <td colspan="3">
                            <input type="text" name="answer" class="w3-input" placeholder="Answer" required value="<?php echo $res['Security_Answer']; ?>">
                        </td>
                    </tr> 
                    <tr>
                    	<td>
                    		Username:
                    	</td>
                    	<td>
                    		<input type="text" name="uname" value="<?php echo $res['P_Username']; ?>" class="w3-input" required>
                    	</td>
                    	<td colspan="2" align="center">
                    		<a href="changePasswordP.php?id=<?php echo $pid;?>" class="link">Change Password</a>
                    	</td>
                    </tr>  
                    <tr>
                        <td colspan="2" align="center">
                            <button type="submit" name="update" class="button">Update</button>
                        </td>
                        <td colspan="2" align="center">
                            <button type="submit" name="cancel" class="button" formaction="manageAccountP.php">Cancel</button>
                        </td>
                    </tr>                 
        			<?php
                    }
        			?>
        		</table>
        	</td>
        </tr>
		</table>
	</form>
</div>

<?php

if (isset($_POST['update'])) {

    $pid = $_GET['id'];
    $pname = $_POST['pname'];
    $pdob = $_POST['pdob'];
    $mail = $_POST['mail'];
    $pmono = $_POST['pmono'];
    $address = $_POST['address'];
    $uname = $_POST['uname'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    $record = "UPDATE principal_info SET P_Name = '$pname', P_Dob = '$pdob', P_Email = '$mail', P_MobileNo = '$pmono' , P_Address = '$address', P_Username = '$uname' , Security_Question = '$question' , Security_Answer = '$answer' WHERE P_Id = '$pid' ";

    if (mysqli_query($con, $record)) {
        //echo "Data Inserted ";
    } 
    if($record){
        $_SESSION['status']="Data Updated";
        $_SESSION['status_code']="success";
    }
    else{
        $_SESSION['status']="data is not inserted";
        $_SESSION['status_code']="error";
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
