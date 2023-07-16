<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<script src="func1.js"></script>
<head>
	<style>
		tr, td, th{
        padding: 2% 20px;
        font-size: 20px;
        height: 85%;
      }
	</style>
</head>
<?php
include 'facultyDashboard.php';
?>
<div class="home-content">
<form method="post">
		<table border="1" class="table1">
			<tr class="bgheading">
				<td style="width: 30%;">
					<h2 class="heading">Add Student</h2>
				</td>
			</tr>
			<tr>
				<td>
		<table>
			<tr>
				<td>
		            Name: 
		        </td>
		        <td class="td">
		        	<input type="text" name="sname" class="w3-input" placeholder="Student Name" required>
                </td>		    
		    </tr>
		    <tr>
				<td>
		            Roll No: 
		        </td>
		        <td class="td">
		        	<input type="number" name="rno" class="w3-input" placeholder="Roll No" required>
                </td>		    
		    </tr>
		    <tr>   
                <td>
                    Standard: 
		        </td> 
		        <td class="td">
		            <select name = "Standard" class="w3-input" onchange="stanValue(this.value)">
						<option disabled selected>--</option>
							<?php
                            
                                include_once ("Config.php");

                                $result = mysqli_query($con,"SELECT Stan_Name from standard_info");

                                while ($res = mysqli_fetch_array($result)) {
				                      echo "<option value='".$res['Stan_Name'] . "'>".$res['Stan_Name']."</option>";
						            }
							?>
					</select>
		        </td>    
		    </tr> 
		    <tr>   
                <td>
                    Division: 
		        </td> 
		        <td class="td">
		            <select name = "Division" class="w3-input" id="div">
                        <option disabled selected>--</option>
                    </select>
		        </td>    
		    </tr> 
		    <tr>
		    	<td>   
		            Date of Birth: 
                </td>
                <td class="td">
		            <input type="date" name="dob" class="w3-input" required placeholder="Birth Date">
		        </td>   
		    </tr>
		    <tr>
		    	<td>
		            Gender: 
		        </td> 
		        <td>
		            <input type="radio" name="gender" value="Male" required style="cursor: pointer;"> Male
		            <input type="radio" name="gender" value="Female" required style="cursor: pointer;"> Female
		        </td>        
		    </tr>		    
		    <tr>  
                 <td>                
		            Email: 
		         </td>
		         <td class="td">
		            <input type="email" name="email" class="w3-input" required placeholder="Email">
		         </td>   
		    </tr>
		    <tr> 
                <td>
		            Mobile No: 
		        </td>
                <td class="td">
		            <input type="number" name="mobileno" class="w3-input" pattern="[0-9]{10}" required placeholder="Mobile No">
		        </td>    
		    </tr>
		    <tr> 
                <td>
		            Address: 
		        </td>  
		        <td class="td">
		            <textarea name="address" style="height: 70px" class="w3-input" required placeholder="Address"></textarea>
		        </td>     
		    </tr> 
		    <tr>   
                <td>
		            Username: 
		        </td>
		        <td class="td">
		            <input type="text" name="uname" class="w3-input" required placeholder="Username">
		        </td>    
		    </tr> 
		    <tr>    
                <td>
		            Password: 
                </td>
                <td class="td">
		            <input type="password" name="pwd" class="w3-input" required placeholder="Password">
		        </td> 
		    </tr> 
		    <tr align="center"> 		    			   	
                <td colspan="2">
                	<div class="allbutton">
		            <input type="submit" name="add" value="Add">
		            </div>
		        </td>   		         
		    </tr> 
		    </td> 
		   </tr>         
        </table>
    </table>    
	</form>	
</div>	
<?php	


if (isset($_POST['add'])) {

    $sname = $_POST['sname'];
    $rno = $_POST['rno'];
    $standard = $_POST['Standard'];
    $division = $_POST['Division'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $mno = $_POST['mobileno'];
    $address = $_POST['address'];
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

    $record = "INSERT INTO student_info (S_Name, S_RollNo, S_Standard, S_Division, S_Dob, S_Gender, S_Email, S_MobileNo, S_Address, S_Username, S_Password, Security_Question, Security_Answer) values ('$sname','$rno','$standard','$division','$dob','$gender','$email','$mno','$address','$uname', '$pwd', 'Pending', 'Pending')";
    
    if (mysqli_query($con, $record)) {
		//echo "Data Inserted ";
	}

	if($record){
        $_SESSION['status']="Data Inserted";
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
