<?php
	$userid = $_POST["userid"];
	//Connect to database
	$link = mysqli_connect("127.0.0.1","root","","solarcalculator");
	//SQL-command / SQL-Result
	$sql = "SELECT history.from as 'From', history.to as 'To', history.hours as 'Hours', history.location as 'Location' FROM history WHERE $userid = history.user_id;";
	$result = mysqli_query($link, $sql);
	//Make HTML data
	$string = "";
	while($row=mysqli_fetch_array($result))
	{
		$from = substr($row["From"], 0, strpos($row["From"], " "));
		$to = substr($row["To"], 0, strpos($row["To"], " "));
		$htmlline = "<tr><td>$from</td><td>$to</td><td>{$row["Location"]}</td><td>{$row["Hours"]}</td></tr>";
		$string = $htmlline.$string;
	}
	
	$data = [$string];
	echo json_encode($data);
?>