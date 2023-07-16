<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<?php
include 'adminDashboard.php';
include_once ("Config.php");
?>
<div class="home-content">
<form method="post">
	<table border="1" class="table1">
		<tr class="bgheading">
			<td style="width: 30%;">
				<h2 class="heading">Add Standard</h2>
			</td>
		</tr>
		<tr>
			<td>
				<table>
					<tr>
						<td>
							Standard Name: 
						</td>
						<td class="td">
							<input type="text" name="sname" class="w3-input" placeholder="Standard Name" required>
						</td>
					</tr>
					<tr>
						<td>
							Division Name:
						</td>
						<td class="td">
							<input type="text" name="dname" class="w3-input" placeholder="Division Name" required>
						</td>
					</tr>		
					<tr> 
						<td></td>							   	
                        <td colspan="2">
                        	<div class="allbutton">	
		                    <input type="submit" name="add" value="Add">
		                    </div>
		                </td> 		                   
		            </tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table class="table3" border="1">
					<tr>
						<th>Division Name</th>
						<th>Standard Name</th>
						<th>Delete</th>
					</tr>
					
					<?php

					$result = mysqli_query($con, "SELECT * FROM division_info");

					while ($res = mysqli_fetch_array($result)) {
						echo "<tr>";
						$divId = $res['D_Id'];
						echo "<td>".$res['D_Name']."</td>";
						echo "<td>".$res['Stan_Name']."</td>";
						echo "<td><a href='deleteDivision.php?id=$divId'>Delete</a></td>";
						echo "</tr>";
					}
					?>				
				</table>	
			</td>
		</tr>
	</table>
</form>
</div>
<?php

if (isset($_POST['add'])) {

	$dname = $_POST['dname'];
	$sname = $_POST['sname'];

	$record = "INSERT into division_info (D_Name,Stan_Name) values ('$dname','$sname')";

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
