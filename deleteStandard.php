<?php

session_start();
include_once ("Config.php");

$id = $_GET['id'];

$record = mysqli_query($con, "DELETE FROM standard_info WHERE S_Id = '$id'");

header("Location:addStandard.php");

?>