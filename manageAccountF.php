<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<?php
include 'facultyDashboard.php';
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
    .button1{
      font-size: 15px;
      background-color:#0A2558 ; 
      border: solid; 
      padding: 10px 22px; 
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
                <h2 class="heading">Manage Account</h2>
            </td>
        </tr>
        <tr>
        	<td>
        		<table class="table3">
        			
        				<?php

        				include_once ("Config.php");

        				$fid = $_SESSION['fid'];

        				$result = mysqli_query($con,"SELECT * FROM faculty_info WHERE F_Id = '$fid' ");

        				while ($res = mysqli_fetch_array($result)) {
        					$fid = $res['F_Id'];
        					echo "<tr>";
        					echo "<td align='center'><i class='bi-person-circle size'></i></td>";
        					echo "<td align='left'><h2>".$res['F_Name']."</h2></td>";   
        					echo "<td align='right' colspan='2'><a href='editProfileF.php?id=$fid'><i class='bi-pencil-square'></i> Edit </a></td>";    				
        				?>
        			</tr>
                    <tr>
                    	<td>
                    		Full Name:
                    	</td>
                    	<td>
                    		<input type="text" name="fname" id="fname" value="<?php echo $res['F_Name']; ?>" class="w3-input" disabled>
                    	</td>
                    	<td>
                    		Date of Birth:
                    	</td>
                    	<td>
                    		<input type="date" name="fdob" id="fdob" value="<?php echo $res['F_Dob']; ?>" class="w3-input" disabled>
                    	</td>
                    </tr>
                    <tr>
                    	<td>
                    		Email:
                    	</td>
                    	<td>
                    		<input type="email" name="mail" id="mail" value="<?php echo $res['F_Email']; ?>" class="w3-input" disabled>
                    	</td>
                    	<td>
                    		Mobile No:
                    	</td>
                    	<td>
                    		<input type="number" name="fmono" id="fmono" value="<?php echo $res['F_MobileNo']; ?>" class="w3-input" disabled>
                    	</td>
                    </tr>
                    <tr>
                    	<td>
                    		Address:
                    	</td>
                    	<td colspan="3">
                    		 <textarea name="address" id="address" style="height: 70px" class="w3-input" disabled placeholder="Address"><?php echo $res['F_Address']; ?></textarea>
                    	</td>
                    </tr>
                    <tr>
                        <td>
                            Security Question:
                        </td>
                        <td>
                            <input type="text" name="question" id="question" value="<?php echo $res['Security_Question']; ?>" class="w3-input" disabled>
                        </td>
                        <td>
                            Security Answer:
                        </td>
                        <td>
                            <input type="text" name="answer" id="answer" value="<?php echo $res['Security_Answer']; ?>" class="w3-input" disabled>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                    		Username:
                    	</td>
                    	<td>
                    		<input type="text" name="uname" id="uname" value="<?php echo $res['F_Username']; ?>" class="w3-input" disabled>
                    	</td>
                    	<td align="center" colspan="2">
                    		<a href="changePasswordF.php?id=<?php echo $fid;?>" class="link">Change Password</a>
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

<script>
	function toggle() {
		document.getElementById("fname").disabled = !document.getElementById("fname").disabled;
		document.getElementById("fdob").disabled = !document.getElementById("fdob").disabled;
		document.getElementById("mail").disabled = !document.getElementById("mail").disabled;
		document.getElementById("fmono").disabled = !document.getElementById("fmono").disabled;
		document.getElementById("address").disabled = !document.getElementById("address").disabled;
		document.getElementById("uname").disabled = !document.getElementById("uname").disabled;
	}
	
</script>