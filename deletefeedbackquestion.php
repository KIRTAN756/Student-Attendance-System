<?php

session_start();
include_once ("Config.php");

$id = $_GET['id'];

$record = mysqli_query($con, "DELETE FROM feedback_question WHERE FB_Id = '$id'");

header("Location:takefeedback.php");

?>