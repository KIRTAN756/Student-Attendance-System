<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <style>

        .link{
            font-size: 14px;
            text-decoration: none;
            background-color: #0A2558; 
            border: solid #0A2558;              
            padding-bottom: 0px;
            padding-top: 26px;
            padding-right: 0px;
            padding-left: 0px;
            color: white; 
            cursor: pointer;
        }
        .links{
            padding-left: 95%;
        }
        .head span{
             width:13px;
             display: inline-block;
        }
        .link .size{
            font-size: 50px;
            align-content: center;
        }
    </style>
</head>
<?php
include 'facultyDashboard.php';
?>
<div class="home-content">
<form method="post">
	<table border="1" class="table1">
		<tr class="bgheading">
            <td style="width: 30%;" class="head">
               <span id="head1"><h2 class="heading">Reply</h2></span><span id="head2" class="links"><a href="complainReportF.php" class="link"><i class="bi-x-square size"></i></a></span>
			</td>
		</tr>
		<tr>
			<td>
				<table class="table3" border="1" align ="center">
				    <tr>
					    <th>Student Name</th>
					    <th>Complain About</th>
					    <th>Complain Message</th>
					    <th>Reply</th>
					</tr>
				    <?php

                        include_once ("Config.php");

                        $id = $_GET['id'];

                        $result = mysqli_query($con, "SELECT student_info.S_Name, complain_info.C_About, complain_info.C_Id, complain_info.C_Message, complain_info.C_Id FROM student_info INNER JOIN complain_info on student_info.S_Id=complain_info.S_Id WHERE C_Id = '$id'");

                        while ($res= mysqli_fetch_array($result)) {
                        
                            echo "<tr>";
                            $id = $res['C_Id'];

                            echo "<td>".$res['S_Name']."</td>";
                            echo "<td>".$res['C_About']."</td>";
                            echo "<td>".$res['C_Message']."</td>";

                        ?>
                            <td>
                                <textarea name="cReply" style="height: 75px" required class="w3-input" placeholder="Reply"></textarea>
                            </td> 
                    <?php 
                        }                                       
				    ?>
				    </tr>
                    <tr>
                        <td colspan="4" align="center">
                            <div class="allbutton"> 
                            <input type="submit" id="<?php $res['C_Id']; ?>" name="reply" value="Reply">
                            </div>
                        </td>
                    </tr>
			    </table>
			</td>
		</tr>
	</table>
</form>
</div>
<?php

     if (isset($_POST['reply'])) {

     	$cReply = $_POST['cReply'];
     	$record = "UPDATE complain_info set C_Reply = '$cReply' where C_Id = '$id'";
     	if (mysqli_query($con, $record)) {
            //echo "Data Inserted ";
        }

        if($record){
            $_SESSION['status']="Replyed";
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
