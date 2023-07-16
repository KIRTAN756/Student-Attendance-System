<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<script src="func1.js"></script>
<?php
include 'principalDashboard.php';
include_once ("Config.php");
?>
<style>
    .table4{
        padding: 10px 10px;
    }
</style>
<div class="home-content">
	<form method="post" action="<?php $_PHP_SELF ?>">
		<table border="1" class="table1">
			<tr class="bgheading">
				<td style="width: 30%;">
                    <h2 class="heading">Student Data</h2>
                </td>
			</tr>
			<tr>
            <td>
                <table>
                    <tr class="table4">
                        <td class="table4">Standard</td>
                        <td class="table4">
                            <select name = "Standard" class="w3-input" onchange="stanValue(this.value)">
                                <option disabled selected>--</option>
                                    <?php

                                        $result = mysqli_query($con,"SELECT Stan_Name from standard_info");

                                        while ($res = mysqli_fetch_array($result)) {
                                            echo "<option value='".$res['Stan_Name'] . "'>".$res['Stan_Name']."</option>";
                                        }
                                    ?>
                            	</select>
                        	</td>
                        	<td class="table4">Division</td>     
                        	<td class="table4">
                            	<select name = "Division" class="w3-input" id="div">
                                    <option disabled selected>--</option>
                                </select>
                        	</td>    
                        	<td>
                            	<button class="button" type="submit" name="display">Display</button>
                        	</td>
                    	</tr>    
                	</table>
            	</td>
        	</tr>
        	<?php
        	if (isset($_POST['display'])) {
        	?>
			<tr>
				<td>
					<table class="table3" border="1">
						<tr>
							<th>Roll No</th>
							<th>Name</th>
							<th>Profile</th>
						</tr>
						<?php

						$standard = $_POST['Standard'];
                        $division = $_POST['Division'];

						$result = mysqli_query($con,"SELECT * FROM student_info WHERE S_Standard = '$standard' AND S_Division = '$division' ORDER BY S_RollNo");

						while ($res = mysqli_fetch_array($result)) {
							echo "<tr>";
							$sid = $res['S_Id'];						
							echo "<td>".$res['S_RollNo']."</td>";
							echo "<td>".$res['S_Name']."</td>";
							echo "<td><a href='viewProfileSP.php?id=$sid'>View</a></td>";
							echo "</tr>";
						}
					}	
						?>
					</table>
				</td>
			</tr>
		</table>
	</form>
</div>