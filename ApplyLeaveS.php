<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<?php
include 'studentDashboard.php';
?>
<div class="home-content">
<form method="post">
		<table border="1" class="table1">
			<tr class="bgheading">
				<td style="width: 30%;">
					<h2 class="heading">Apply For Leave</h2>
				</td>
			</tr>
			<tr>
			<td>
		<table>
			<tr>
				<td>
		            Leave Reason: 
		        </td>
		        <td class="td">
		        	<textarea name="L_Reason" style="height: 75px" class="w3-input" required placeholder="Reason"></textarea>
                </td>		    
		    </tr>
		    <tr> 
                <td>
		            No Days: 
		        </td>  
		        <td class="td">  
		            <input type="number" name="noDays" class="w3-input" placeholder="2"
		            required="">
		        </td>     
		    </tr> 
		    <tr align="center"> 		    			   	
                <td colspan="2">
                	<div class="allbutton">
		            <input type="submit" name="apply" value="Apply">
		            </div> 
		        </td>	           
		    </tr> 
		    </td> 
		   </tr>   
        </table>
    
<?php

include_once ("Config.php");

if (isset($_POST['apply'])) {

	$L_Reason = $_POST['L_Reason'];
	$noDays = $_POST['noDays'];
	$sid = $_SESSION['sid'];

	$record = "INSERT into student_leave_info (S_Id,Leave_Reason,NoDays,Leave_Status) values ('$sid','$L_Reason','$noDays','Pending')";

	if (mysqli_query($con, $record)) {
		//echo "Data Inserted ";
	} 
	if($record){
        $_SESSION['status']="Data inserted";
        $_SESSION['status_code']="success";
    }
    else{
        $_SESSION['status']="data is not inserted";
        $_SESSION['status_code']="error";
    }

}

?>
<tr>
	<td>
    <table class="table3" border="1" align="center">
    	<tr>	
			<th>Leave Reason</th>
			<th>No Days</th>
			<th>Leave Status</th>
		</tr>
		<?php
            
            $sid = $_SESSION['sid'];

		    $result = mysqli_query($con,"SELECT Leave_Reason,NoDays,Leave_Status FROM student_leave_info WHERE S_Id ='$sid'");
		    
            while($res = mysqli_fetch_array($result)){
            	echo "<tr>";
            	echo "<td>".$res['Leave_Reason']."</td>";
            	echo "<td>".$res['NoDays']."</td>";
            	echo "<td>".$res['Leave_Status']."</td>";
            	echo "</tr>";
            }
        
		?>
    </table>
</td>
</tr>
</table>    
</form>
</div>

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
