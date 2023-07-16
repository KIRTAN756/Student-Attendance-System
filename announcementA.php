<head>
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
	<style>
		.ann textarea{
          width: 100%;
          padding: 10px;
          height: 150px;
          border-radius: 4px;      
		}
	</style>
</head>
<?php
include 'adminDashboard.php';
?>
<div class="home-content">
<form method="post"> 
	<table border="1" class="table1">
		<tr class="bgheading">
			<td style="width: 30%;">
				<h2 class="heading">Make Announcement</h2>
			</td>
		</tr>
		<tr>
			<td>
				<?php
                    if (isset($_SESSION['admin'])) {
                     	echo $_SESSION['admin'];
                    }
				?>
			</td>
		</tr>		
		<tr>
			<td>
				<div class="ann">
					<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
					<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
				    <textarea name="message"></textarea>
				</div>
		    </td>
		</tr>    
		<tr style="background-color: white;"> 
 			<td colspan="2" align="center">    
 			    <div class="sub allbutton">
 				    <input type="submit" name="announce" value="Announce">
 			    </div>
 			</td>
 		</tr>
	</table>
</form>
</div>
<?php

include_once ("Config.php");

if (isset($_POST['announce'])) {

	$message = $_POST['message'];

	if (isset($_SESSION['admin'])) {
       $announcer = $_SESSION['admin'];
    }
    elseif (isset($_SESSION['principal'])) {
       $announcer = $_SESSION['principal'];
    }
    
    $record = "INSERT INTO announcement_info (Announcer_Name, A_Message) values ('$announcer','$message')";

    if (mysqli_query($con, $record)) {
		//echo "Data Inserted ";
	}
	if($record){
        $_SESSION['status']="Data Inserted";
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
