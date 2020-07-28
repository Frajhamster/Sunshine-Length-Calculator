<?php
	$userid = $_POST["userid"];
	$datenow = $_POST["datenow"].":00";
	$datelater = $_POST["datelater"].":00";
	$location = $_POST["location"];
	$hours = floor($_POST["hours"] * 100) / 100;
	//Connect to database
	$link = mysqli_connect("127.0.0.1","root","","solarcalculator");
	//SQL-command / SQL-Result
	$sql = "INSERT INTO `history` (`user_id`, `from`, `to`, `hours`, `location`) VALUES ($userid, '$datenow', '$datelater', $hours, '$location');";
	$result = mysqli_query($link, $sql);
?>