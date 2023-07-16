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
        				<?php

        				$fid = $_GET['id'];

        				$result = mysqli_query($con, "SELECT * FROM faculty_info WHERE F_Id = '$fid'");

        				while ($res = mysqli_fetch_array($result)) {
        					echo "<tr>";
        					echo "<th colspan='6'>"."Prof. ".$res['F_Name']."</th>";
        					echo "</tr>";
        				}

        				$result1 = mysqli_query($con, "SELECT * FROM feedback_question");

        				$m = 0;
        				while ($res = mysqli_fetch_array($result1)) {
        					echo "<tr>";
        						echo "<td>".$res['FB_Question']."</td>";
        						$fbid = $res['FB_Id'];
        						$fb_question = $res['FB_Question'];
        						$i = 0;

        				?>	
        						<td>
        							<input type="hidden" name="ques[<?php echo $m; ?>]" value="<?php echo $fb_question; ?>">
        							<input type="radio" name="performence[<?php echo $m; ?>]" value="Outstanding" required style="cursor: pointer;"> Outstanding
        						</td>
        						<td>
        							<input type="radio" name="performence[<?php echo $m; ?>]" value="Excellent" required style="cursor: pointer;"> Excellent
        						</td>
        						<td>
        							<input type="radio" name="performence[<?php echo $m; ?>]" value="Good" required style="cursor: pointer;"> Good
        						</td>
        						<td>
        							<input type="radio" name="performence[<?php echo $m; ?>]" value="Staisfactory" required style="cursor: pointer;"> Staisfactory
        						</td>
        						<td>
        							<input type="radio" name="performence[<?php echo $m; $m+=1;?>]" value="Not Staisfactory" required style="cursor: pointer;"> Not Staisfactory
        						</td>
        					</tr>
        				<?php	
        				}
        				?>
        				<tr align="center">
        					<td colspan="6">
        						<button class="button" type="submit" name="feedback">Submit</button>
        					</td>
        				</tr>
        			</table>
        		</td>
        	</tr>
		</table>
	</form>
</div>

<?php

if (isset($_POST['feedback'])) {
	
	$ques = $_POST['ques'];
	$answer = $_POST['performence'];
	$fid = $_GET['id'];
	$len = count($ques);
	echo "<br>";	

	for ($i=0; $i <= $len-1 ; $i++) { 
		
		$record = "INSERT INTO feedback_answer (FB_Question,FB_Answer,F_Id) VALUES ('$ques[$i]','$answer[$i]','$fid')";

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
