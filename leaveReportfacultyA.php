<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<?php
include ("Config.php");
include 'adminDashboard.php';
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
                    
                    include_once ("Config.php");

                    $result = mysqli_query($con, "SELECT faculty_info.F_Name, faculty_info.F_Id, faculty_leave_info.L_Id, faculty_leave_info.Leave_Reason, faculty_leave_info.NoDays, faculty_leave_info.Leave_Status FROM faculty_info INNER JOIN faculty_leave_info on faculty_info.F_Id=faculty_leave_info.F_Id ");

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
        