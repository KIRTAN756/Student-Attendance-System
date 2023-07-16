<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<?php
include ("Config.php");
include 'principalDashboard.php';
?>
<style>
    .size{
        font-size: 20px;
    }
    .table4{
        padding: 10px 10px;
    }
</style>
<div class="home-content">
<form action="<?php $_PHP_SELF ?>" method="post">
    <table border="1" class="table1">
        <tr class="bgheading">
            <td style="width: 30%;" colspan="3">
                <h2 class="heading">Leave Report of Faculty</h2>
            </td>
        </tr>
        <tr>
            <td>
                <table class="table3" border="1">                    
                    <tr>    
                        <th>Leave ID</th>
                        <th>Faculty Name</th>
                        <th>Leave Reason</th>
                        <th>No Days</th>
                        <th>Reply</th>
                    </tr>
                    <?php           

                        $result = mysqli_query($con, "SELECT faculty_info.F_Name, faculty_info.F_Id, faculty_leave_info.L_Id, faculty_leave_info.Leave_Reason, faculty_leave_info.NoDays  FROM faculty_info INNER JOIN faculty_leave_info on faculty_info.F_Id=faculty_leave_info.F_Id WHERE faculty_leave_info.Leave_Status='Pending'");

                        while ($res= mysqli_fetch_array($result)) {
                        
                            echo "<tr>";
                            $lid = $res['L_Id'];
                            echo "<td>".$res['L_Id']."</td>"; ?>
                            <td><?php echo $res['F_Name']; ?></td>
                        <?php    
                            echo "<td>".$res['Leave_Reason']."</td>";
                            echo "<td>".$res['NoDays']."</td>";

                        ?>
                            <td>
                                <button type="submit" name="accept" formaction="leaveReportP.php?id=<?php echo $lid?>" class="button"><i class="bi-check-square size"></i></button>
                                <button type="submit" name="reject" formaction="leaveReportP.php?id=<?php echo $lid?>" class="button"><i class="bi-x-square size"></i>
                                </button>
                            </td> 
                    <?php 
                        }                                       
                    ?>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table class="table3" border="1">
                    <tr>
                        <th>Leave ID</th>
                        <th>Faculty Name</th>
                        <th>Leave Reason</th>
                        <th>No Days</th>
                        <th>Reply</th>
                    </tr>
                    <?php
                    
                    $result = mysqli_query($con, "SELECT faculty_info.F_Name, faculty_info.F_Id, faculty_leave_info.L_Id, faculty_leave_info.Leave_Reason, faculty_leave_info.NoDays, faculty_leave_info.Leave_Status FROM faculty_info INNER JOIN faculty_leave_info on faculty_info.F_Id=faculty_leave_info.F_Id WHERE faculty_leave_info.Leave_Status='Accept' or faculty_leave_info.Leave_Status='Reject'");

                    while ($res= mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>".$res['L_Id']."</td>";
                        echo "<td>".$res['F_Name']."</td>";
                        echo "<td>".$res['Leave_Reason']."</td>";
                        echo "<td>".$res['NoDays']."</td>";
                        echo "<td>".$res['Leave_Status']."</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>  
            </td>
        </tr>
    </table>
</form>
</div>

<?php

if (isset($_POST['accept'])) {
    
    $id = $_GET['id'];
    $record = "UPDATE faculty_leave_info SET Leave_Status = 'Accept' WHERE L_Id = '$id'";

    if (mysqli_query($con, $record)) {
        //echo "Data Inserted ";
    } 

    if($record){
        $_SESSION['status']="Data Updated";
        $_SESSION['status_code']="success";
    }
    else{
        $_SESSION['status']="data is not inserted";
        $_SESSION['status_code']="error";
    }
   
}

if (isset($_POST['reject'])) {
    
    $id = $_GET['id'];
    $record = "UPDATE faculty_leave_info SET Leave_Status = 'Reject' WHERE L_Id = '$id'";

    if (mysqli_query($con, $record)) {
        //echo "Data Inserted ";
    } 
    if($record){
        $_SESSION['status']="Data Updated";
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
          