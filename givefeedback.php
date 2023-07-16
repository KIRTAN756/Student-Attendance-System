<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<?php
include 'studentDashboard.php';
include_once 'Config.php';
?>

<div class="home-content">
	<form method="post">
		<table class="table1" border="1">
			<tr class="bgheading">
            	<td style="width: 30%;">
                	<h2 class="heading">Give Feedback</h2>
            	</td>
        	</tr>
        	<tr>
        		<td>
        			<table class="table3" border="1">
        				<tr>
        					<th>Faculty</th>
        				</tr>
        				<?php

        				$result = mysqli_query($con, "SELECT * FROM faculty_info");

        				while ($res = mysqli_fetch_array($result)) {
        					echo "<tr>";
        					$fid = $res['F_Id'];
        					echo "<td><a href='givefeedbackofF.php?id=$fid'>"."Prof. ".$res['F_Name']."</a></td>";
        					echo "</tr>";
        				}
        				?>
        			</table>
        		</td>
        	</tr>
		</table>
	</form>
</div>