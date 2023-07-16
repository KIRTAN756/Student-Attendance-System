<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<script src="func1.js"></script>
<style>
    .size{
        font-size: 20px;
    }
    .table4{
        padding: 10px 10px;
    }
</style>
<?php
include 'facultyDashboard.php';
include_once ("Config.php");
?>
<div class="home-content">
<form action="<?php $_PHP_SELF ?>" method="post">
    <table border="1" class="table1">
        <tr class="bgheading">
            <td style="width: 30%;">
                <h2 class="heading">Leave Report</h2>
            </td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr class="table4">
                        <td class="table4">Standard</td>
                        <td class="table4">
                            <select name = "Standard" class="w3-input" onchange="stanValue(this.value)">
                                <option disabled selected>--</option>
                                    <?php

                                        $result = mysqli_query($con,"SELECT Stan_Name from standard_info");

                                        while ($res = mysqli_fetch_array($result)) {
                                            echo "<option value='".$res['Stan_Name'] . "'>".$res['Stan_Name']."</option>";
                                        }
                                    ?>
                            </select>
                        </td>
                        <td class="table4">Division</td>     
                        <td class="table4">
                            <select name = "Division" class="w3-input" id="div">
                                <option disabled selected>--</option>
                            </select>
                        </td>    
                        <td>
                            <button class="button" type="submit" name="display">Display</button>
                        </td>
                    </tr>    
                </table>
            </td>
        </tr>
        <?php
        if (isset($_POST['display'])) {
        ?>    
        <tr>
            <td>
                <table class="table3" border="1">
                    <tr>    
                        <th>Roll No</th>
                        <th>Student Name</th>
                        <th>Leave Reason</th>
                        <th>No Days</th>
                        <th>Reply</th>
                    </tr>
                    <?php

                        $standard = $_POST['Standard'];
                        $division = $_POST['Division'];

                        $result = mysqli_query($con, "SELECT student_info.S_Name, student_info.S_RollNo, student_info.S_Standard, student_info.S_Division, student_info.S_Id, student_leave_info.L_Id, student_leave_info.Leave_Reason, student_leave_info.NoDays  FROM student_info INNER JOIN student_leave_info on student_info.S_Id=student_leave_info.S_Id WHERE student_leave_info.Leave_Status='Pending' AND student_info.S_Standard = '$standard' AND student_info.S_Division = '$division' ORDER BY student_info.S_RollNo");

                        while ($res= mysqli_fetch_array($result)) {
                        
                            echo "<tr>";
                            $lid = $res['L_Id'];
                            echo "<td>".$res['S_RollNo']."</td>"; ?>
                            <td><?php echo $res['S_Name']; ?></td>
                        <?php    
                            echo "<td>".$res['Leave_Reason']."</td>";
                            echo "<td>".$res['NoDays']."</td>";
                        ?>
                            <td>
                                <button type="submit" name="accept" formaction="leaveReportF.php?id=<?php echo $lid?>" class="button"><i class="bi-check-square size"></i></button>
                                <button type="submit" name="reject" formaction="leaveReportF.php?id=<?php echo $lid?>" class="button"><i class="bi-x-square size"></i>
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
                        <th>Roll No</th>
                        <th>Student Name</th>
                        <th>Leave Reason</th>
                        <th>No Days</th>
                        <th>Reply</th>
                    </tr>
                    <?php
                            

                    $result = mysqli_query($con, "SELECT student_info.S_Name, student_info.S_RollNo, student_info.S_Id, student_info.S_Standard, student_info.S_Division, student_leave_info.L_Id, student_leave_info.Leave_Reason, student_leave_info.NoDays, student_leave_info.Leave_Status FROM student_info INNER JOIN student_leave_info on student_info.S_Id=student_leave_info.S_Id WHERE student_info.S_Standard = '$standard' AND student_info.S_Division = '$division' AND student_leave_info.Leave_Status!='Pending' ORDER BY student_info.S_RollNo");

                    while ($res= mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>".$res['S_RollNo']."</td>";
                        echo "<td>".$res['S_Name']."</td>";
                        echo "<td>".$res['Leave_Reason']."</td>";
                        echo "<td>".$res['NoDays']."</td>";
                        echo "<td>".$res['Leave_Status']."</td>";
                        echo "</tr>";
                    }
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
    $record = "UPDATE student_leave_info SET Leave_Status = 'Accept' WHERE L_Id = '$id'";
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
    $record = "UPDATE student_leave_info SET Leave_Status = 'Reject' WHERE L_Id = '$id'";
    
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
