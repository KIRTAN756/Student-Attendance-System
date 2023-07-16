<?php

include_once ("Config.php");
session_start();

if (isset($_GET['s'])) {
	$s = $_GET['s'];
	$_SESSION['s'] = $s;
}

if (isset($_GET['d'])) {
	
?>
				<table class="table3" border="1" align ="center">
				    <tr>	
					    <th>Student RollNo</th>
					    <th>Student Name</th>
					    <th>Attendance</th>
					</tr>
				    <?php

				    	
				    	$d = $_GET['d'];
				    	$s = $_SESSION['s'];

                        $result = mysqli_query($con, "SELECT S_Id, S_Name, S_RollNo FROM student_info WHERE S_Standard = '$s' AND S_Division = '$d' ORDER BY S_RollNo");
                        
                 
                        while ($res= mysqli_fetch_array($result)) {
                        
                            echo "<tr>";
                            $sid1 = $res['S_Id'];
                        ?>    
                            <td align="center"><?php echo $res['S_RollNo']; ?><input type="hidden" name="student_id[]" value="<?php echo $sid1; ?>"></td>
                        <?php

                            $_SESSION['sid1'] = $sid1; 
                            echo "<td>".$res['S_Name']."</td>";
                            echo "<td>";

                        ?>

                            
                            <div class = 'radio'>
                            <label><input style="cursor: pointer;" type="radio" name="attendance[<?php echo $sid1; ?>]"  value="Present" required>Present</label>
                            &emsp;
                            <label><input style="cursor: pointer;" type="radio" name="attendance[<?php echo $sid1; ?>]" value="Absent">Absent</label>
                            <div>
                            </td>
                        <?php    
                           
                        }                                       
				    ?>
				    </tr>
				    <tr align="center">                     	   	
                        <td colspan="5">
                            <div class="allbutton"> 
		                    <input type="submit" name="add" value="Add">
                            </div> 
		                </td>                           
		            </tr>
			    </table>


<?php


if (isset($_POST['add'])) {
    
    $attendance = $_POST['attendance'];
    $student_id = $_POST['student_id'];
    //$date = $_POST['atten_date'];
    
    $sid1 = $_SESSION['sid1'];

    foreach ($_POST['attendance'] as $index => $value) {

        $record = "INSERT INTO attendance_info (Attendance_status, S_Id) values ('$value','$index')";

        if (mysqli_query($con, $record)) {
            //echo "data inserted";
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
}

?>

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
