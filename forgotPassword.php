<?php
session_start();
include_once ("Config.php");
?>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<style>
	body{
		background-color: lightgray;
	}
	table{
		background-color: white;
	}
	.button{
		text-decoration: none;
	}
</style>
<form method="post">
	<table border="1" class="table1">
		<tr class="bgheading">
            <td style="width: 30%;" colspan="4">
                <h2 class="heading">Forgot Password</h2>
            </td>
        </tr>
		<tr align="center">
			<td>
				<a href="forgotPasswordA.php" class="button">Admin</a>
			</td>
			<td>
				<a href="forgotPasswordP.php" class="button">Principal</a>
			</td>
			<td>
				<a href="forgotPasswordF.php" class="button">Faculty</a>
			</td>
			<td>
				<a href="forgotPasswordS.php" class="button">Student</a>
			</td>
		</tr>
		
		<tr align="center">
			<td colspan="4">
				<a href="index.php" class="button">Close</a>
			</td>
		</tr>
	</table>
</form>