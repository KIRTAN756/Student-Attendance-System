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
                	<h2 class="heading">Faculty Feedback</h2>
            	</td>
        	</tr>
        	<tr>
        		<td>
        			<table>
        				<?php

        				$fid = $_GET['id'];
        				$result = mysqli_query($con, "SELECT * FROM faculty_info WHERE F_Id = '$fid'");

        				while ($res = mysqli_fetch_array($result)) {
        					echo "<tr>";
        					$fid = $res['F_Id'];
        					echo "<td>Prof. ".$res['F_Name']."</td>";
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
        					<th>Question</th>
        					<th>Outstainding</th>
        					<th>Excellent</th>
        					<th>Good</th>
        					<th>Staisfactory</th>
        					<th>Not Staisfactory</th>
        				</tr>
        				<?php

        				$fid = $_GET['id'];

        				$result = mysqli_query($con, "SELECT * FROM feedback_question");

        				while ($res = mysqli_fetch_array($result)) {
        					echo "<tr>";
        					echo "<td>".$res['FB_Question']."</td>";
        					$questions = $res['FB_Question'];


        				$ques1 = mysqli_query($con, "SELECT count(FB_Question) as 'quescnt' FROM feedback_answer WHERE F_Id = '$fid' AND FB_Question = '$questions'");

        				if ($res = mysqli_fetch_array($ques1)) {
        					$GLOBALS['ques'] = $res['quescnt'];
        				}

        				$ques1outstan = mysqli_query($con, "SELECT count(FB_Answer) as 'ques1' FROM feedback_answer WHERE F_Id = '$fid' AND FB_Question = '$questions' AND FB_Answer = 'Outstanding'");

        				$ques1excell = mysqli_query($con, "SELECT count(FB_Answer) as 'ques1' FROM feedback_answer WHERE F_Id = '$fid' AND FB_Question = '$questions' AND FB_Answer = 'Excellent'");

        				$ques1good = mysqli_query($con, "SELECT count(FB_Answer) as 'ques1' FROM feedback_answer WHERE F_Id = '$fid' AND FB_Question = '$questions' AND FB_Answer = 'Good'");

        				$ques1stisfy = mysqli_query($con, "SELECT count(FB_Answer) as 'ques1' FROM feedback_answer WHERE F_Id = '$fid' AND FB_Question = '$questions' AND FB_Answer = 'Staisfactory'");

        				$ques1notstisfy = mysqli_query($con, "SELECT count(FB_Answer) as 'ques1' FROM feedback_answer WHERE F_Id = '$fid' AND FB_Question = '$questions' AND FB_Answer = 'Not Staisfactory'");
        				
        				if ($res = mysqli_fetch_array($ques1outstan)) {
        					$total = $res['ques1'];
        					$ans = $total * 100 / $ques;
        					echo "<td align='center'>".round($ans, 2)." %</td>";
        				}

        				if ($res = mysqli_fetch_array($ques1excell)) {
        					$total = $res['ques1'];
        					$ans = $total * 100 / $ques;
        					echo "<td align='center'>".round($ans, 2)." %</td>";
        				}

        				if ($res = mysqli_fetch_array($ques1good)) {
        					$total = $res['ques1'];
        					$ans = $total * 100 / $ques;
        					echo "<td align='center'>".round($ans, 2)." %</td>";
        				}

        				if ($res = mysqli_fetch_array($ques1stisfy)) {
        					$total = $res['ques1'];
        					$ans = $total * 100 / $ques;
        					echo "<td align='center'>".round($ans, 2)." %</td>";
        				}

        				if ($res = mysqli_fetch_array($ques1notstisfy)) {
        					$total = $res['ques1'];
        					$ans = $total * 100 / $ques;
        					echo "<td align='center'>".round($ans, 2)." %</td>";
        				}

        			}
        					echo "</tr>";        					
        				
        				?>
        			</table>
        		</td>
        	</tr>
		</table>
	</form>
</div>