<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<script src="func1.js"></script>
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
                <h2 class="heading">Leave Report of Students</h2>
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
        </tr>.
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

                    $result = mysqli_query($con, "SELECT student_info.S_Name, student_info.S_Id, student_info.S_RollNo, student_info.S_Standard, student_info.S_Division, student_leave_info.L_Id, student_leave_info.Leave_Reason, student_leave_info.NoDays, student_leave_info.Leave_Status FROM student_info INNER JOIN student_leave_info on student_info.S_Id=student_leave_info.S_Id WHERE student_info.S_Standard = '$standard'  ORDER BY student_info.S_RollNo");

                    while ($res = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>".$res['S_RollNo']."</td>";
                        echo "<td>".$res['S_Name']."</td>";
                        echo "<td>".$res['Leave_Reason']."</td>";
                        echo "<td>".$res['NoDays']."</td>";
                        echo "<td>".$res['Leave_Status']."</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </td>
        </tr>
        <?php
        }   
        ?>
    </table>
</form>
</div>

          