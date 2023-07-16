<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<script src="func1.js"></script>
<script src="alert.min.js"></script>
<?php
include 'facultyDashboard.php';
include_once ("Config.php");
?>
<style>
    .table4{
        padding: 10px 10px;
    }
</style>
<div class="home-content">
<form method="post">
    <table border="1" class="table1">
        <tr class="bgheading">
            <td style="width: 30%;">
                <h2 class="heading">Attendance</h2>
            </td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr class="table4">
                        <td class="table4">Standard</td>
                        <td class="table4">
                            <select name = "Standard" class="w3-input" onchange="stanValue(this.value);stanValue1(this.value);">
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
                            <select name = "Division" class="w3-input" id="div" onchange="divValue(this.value)">
                                <option disabled selected>--</option>
                            </select>
                        </td>
                        <td class="table4">Date</td>
                        <td class="table4">
                            <input type="date" name="atten_date" class="w3-input">
                        </td>     
                    </tr>    
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <div id="Attentable">
        
                </div>
            </td>    
        </tr>
    </table>
</form>
</div>
