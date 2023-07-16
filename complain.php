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
					<h2 class="heading">Complain</h2>
				</td>
			</tr>
			<tr>
			<td>
		<table>
			<tr>
				<td>
		            Complain About: 
		        </td>
		        <td class="td">
		        	<input type="text" name="cabout" class="w3-input" placeholder="About" required>
                </td>		    
		    </tr>
		    <tr> 
                <td>
		            Message: 
		        </td>  
		        <td class="td">  
		            <textarea name="cmessage" style="height: 75px" class="w3-input" required placeholder="message"></textarea>
		        </td>     
		    </tr> 
		    <tr align="center"> 		    			   	
                <td colspan="2">
                	<div class="allbutton">
		            <input type="submit" name="complain" value="Complain">
		            </div> 
		        </td>	           
		    </tr> 
		    </td> 
		   </tr>   
        </table>
    
<?php

include_once ("Config.php");

if (isset($_POST['complain'])) {

	$cmessage = $_POST['cmessage'];
    
    $cabout = $_POST['cabout'];
   
    $sid = $_SESSION['sid'];

    $record = "INSERT INTO complain_info (S_Id, C_About, C_Message, C_Reply) values ('$sid','$cabout','$cmessage','Pending')";

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
<tr>
	<td>
    <table class="table3" border="1" align="center">
    	<tr>	
			<th>Complain About</th>
			<th>Complain Message</th>
			<th>Reply</th>
		</tr>
		<?php
            
            $sid = $_SESSION['sid'];

		    $result = mysqli_query($con,"SELECT C_About,C_Message,C_Reply FROM complain_info WHERE S_Id ='$sid'");

            while($res = mysqli_fetch_array($result)){
            	echo "<tr>";
            	echo "<td>".$res['C_About']."</td>";
            	echo "<td>".$res['C_Message']."</td>";
            	echo "<td>".$res['C_Reply']."</td>";
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
