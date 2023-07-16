<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<script src="func1.js"></script>
<?php
include 'facultyDashboard.php';
include_once 'Config.php';
?>
<style>
	/* position: sticky;*/
    .table4{
        padding: 10px 10px;
    } 
</style>
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
				<table class="table3" border="1" align ="center">
                    <?php

                    echo "<tr>";
                    echo "<th>S_RollNo</th>";
                    echo "<th>S_Name</th>";                        
                            
                    $result1 = mysqli_query($con, "SELECT distinct Attendance_date FROM attendance_info WHERE month(Attendance_date) = 11 ORDER BY Attendance_date");

                        while ($res1 = mysqli_fetch_array($result1)) {
                            $date = strtotime($res1['Attendance_date']);
                            echo "<th>".date("d-m-Y",$date)."</th>";
                        }
                    echo "</tr>";    
       
                    $standard = $_POST['Standard'];
                    $division = $_POST['Division'];

                    $result = mysqli_query($con,"SELECT S_Id, S_RollNo, S_Name FROM student_info WHERE S_Standard = '$standard' AND S_Division = '$division' ORDER BY S_RollNo");

                    while ($res = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$res['S_RollNo']."</td>";
                        echo "<td>".$res['S_Name']."</td>";

                        $sid = $res['S_Id'];
                        $sid1 = [$res['S_Id']];
                        $length = count($sid1);

                        for ($i=1; $i <= $length ; $i++) { 

                            $result2 = mysqli_query($con,"SELECT student_info.S_Id, student_info.S_RollNo, student_info.S_Name,attendance_info.Attendance_date, attendance_info.Attendance_status FROM student_info INNER JOIN attendance_info on student_info.S_Id = attendance_info.S_Id WHERE month(attendance_info.Attendance_date) = 11 and student_info.S_Id = '$sid' and student_info.S_Standard = '$standard' AND student_info.S_Division = '$division' ORDER BY student_info.S_RollNo
                                ");
                            while ($res2 = mysqli_fetch_array($result2)) {
                                echo "<td>".$res2['Attendance_status']."</td>"; 
                            }
                            break;
                            echo "</tr>";
                        }      
                    }
                }    
				    ?>
			    </table>
			</td>
		</tr>
	</table>
</form>
</div>
