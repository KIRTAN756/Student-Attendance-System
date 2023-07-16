<html>
<head>
	<title>NEWS</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style2.css">
</head>
<?php
include 'adminDashboard.php';
?>
<body>
	<div class="home-content">
	<table border="1" class="table1">
		<div class="title">
			<tr class="bgheading">
				<td style="width: 30%;">
					<h2 class="heading">NEWS</h2>
				</td>
			</tr>
		</div>	
			<tr>
				<td>
				<div class="scroll">	
				<?php
                    include_once ("Config.php");

                    $result = mysqli_query($con, "SELECT * FROM announcement_info");

                    while ($res = mysqli_fetch_array($result)) {
                    	echo "<table class = 'table2'>";
          	            echo "<tr align = 'left'>";
          	            echo "<td>".$res['Announcer_Name']."</td>";
          	            echo "</tr>";
          	            echo "<tr>";
          	            echo "<td>".$res['A_Message']."</td>";
          	            echo "</tr>";
    	                echo "<tr align = 'right'>";
          	            echo "<td>".$res['Announcement_date']."</td>";
          	            echo "</tr>";
    	                echo "</table>";
    	                echo "<br>";
                    }  
				?>
				</div>
			    </td>
			</tr>
	</table>		
</div>
</body>
</html>