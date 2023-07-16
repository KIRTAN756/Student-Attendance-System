<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<?php
include 'principalDashboard.php';
include_once 'Config.php';
?>

<div class="home-content">
	<form method="post">
		<table border="1" class="table1">
			<tr class="bgheading">
            	<td style="width: 30%;">
                	<h2 class="heading">Take Feedback</h2>
            	</td>
        	</tr>
        	<tr>
        		<td>
        			<table border="1" class="table3">
        				<tr>
        					<th>Question</th>
        					<th>Delete</th>
        				</tr>
        				<?php

        				$result = mysqli_query($con, "SELECT * FROM feedback_question");

        				while ($res = mysqli_fetch_array($result)) {
        					echo "<tr>";
        					$fbid = $res['FB_Id'];
        					echo "<td>".$res['FB_Question']."</td>";
        					echo "<td><a href='deletefeedbackquestion.php?id=$fbid'>Delete</a></td>";
        					echo "</tr>";
        				}
        				?>
        			</table>
        		</td>
        	</tr>
        	<tr>
        		<td>
        			<table border="1" class="table3">
        				<tr>
        					<td>
        						Question:
        					</td>
        					<td class="td">
        						<textarea name="question" required class="w3-input" placeholder="Question"></textarea>
        					</td>
        					<td>
        						<button class="button" type="submit" name="add">Add</button>
        					</td>
        				</tr>
        			</table>
        		</td>
        	</tr>
		</table>
	</form>
</div>

<?php

if (isset($_POST['add'])) {
	
	$ques = $_POST['question'];

	$record = "INSERT INTO feedback_question (FB_Question) values('$ques')";

	if (mysqli_query($con, $record)) {
		//echo "Data Inserted ";
	}
	if($record){
        $_SESSION['status']="Added";
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

