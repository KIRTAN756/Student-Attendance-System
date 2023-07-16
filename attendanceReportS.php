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
					<h2 class="heading">Attendance Report</h2>
				</td>
			</tr>
			<tr>
				<td>
					<table class="table3" border="1" align ="center">
						<tr>
							<th>Attendance Date</th>
							<th>Attendance Status</th>
						</tr>
						<?php
                        
                        include_once 'Config.php';

                        $sid = $_SESSION['sid'];

                        $result = mysqli_query($con,"SELECT Attendance_Date, Attendance_Status from attendance_info WHERE S_Id = '$sid' ");

                        while ($res = mysqli_fetch_array($result)) {
                        	echo "<tr>";
                        	$date = strtotime($res['Attendance_Date']);
                            echo "<td>".date("d-m-Y",$date)."</td>";
                        	echo "<td>".$res['Attendance_Status']."</td>";
                        	echo "</tr>";
                        }
                        
						?>
					</table>
				</td>
			</tr>
		</table>
	</form>
</div>