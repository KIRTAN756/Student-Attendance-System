<?php

session_start();
include_once ("Config.php");

$id = $_GET['id'];

$record = mysqli_query($con, "DELETE FROM division_info WHERE D_Id = '$id'");

header("Location:addDivision.php");

?>