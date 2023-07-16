<?php
include_once ("Config.php");
session_start();
	if (isset($_GET['s'])) {
	
		$stan = $_GET['s'];

		$sql = mysqli_query($con,"SELECT D_Name FROM division_info WHERE Stan_Name = '$stan'");
		echo "<option disabled selected>--</option>";
		while ($res = mysqli_fetch_array($sql)) {

			echo "<option value='".$res['D_Name'] . "'>".$res['D_Name']."</option>";

		}
	}
?>