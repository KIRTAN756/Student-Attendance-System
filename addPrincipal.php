<link rel="stylesheet" href="style2.css">
<?php
include 'adminDashboard.php';
?>
<div class="home-content">
<form method="post">
		<table border="1" class="table1">
			<tr class="bgheading">
				<td style="width: 30%;">
					<h2 class="heading">Add Principal</h2>
				</td>
			</tr>
			<tr>
				<td >
		<table>
			<tr>
				<td>
		            Name: 
		        </td>
		        <td class="td">
		        	<input type="text" name="pname" class="w3-input" placeholder="Principal Name" required>
                </td>		    
		    </tr>
		    <tr>
		    	<td>
		            Gender: 
		        </td> 
		        <td class="td">
		            <input type="radio" name="gender" value="Male" required style="cursor: pointer;"> Male
		            <input type="radio" name="gender" value="Female" required style="cursor: pointer;"> Female
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
		    <tr> 		
				<td></td>    			   	
                <td>
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

include_once ("Config.php");

if (isset($_POST['add'])) {

    $pname = $_POST['pname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $mno = $_POST['mobileno'];
    $address = $_POST['address'];
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

    $record = "INSERT INTO principal_info (P_Name, P_Gender, P_Dob, P_Email, P_MobileNo, P_Address, P_Username, P_Password, Security_Question, Security_Answer) values ('$pname', '$gender', '$dob', '$email','$mno','$address','$uname','$pwd', 'Pending', 'Pending')";

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
