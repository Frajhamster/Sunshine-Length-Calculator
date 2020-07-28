<?php
	$datenow = $_POST["datenow"];
	$datelater = $_POST["datelater"];
	$lat_deg = $_POST["latitude"];
	$daysbetween = (strtotime($datelater) - strtotime($datenow)) / 86400;
	$sunShine_total = 0;
	for($i = 0; $i < intval($daysbetween); $i++){
		//Convert selected latitude to Radiant
		$lat_rad = $lat_deg * (M_PI/180);
		//Calculate days since 12.21.xxxx
		$daysSinceWinter = ceil((strtotime($datenow."+$i days") - strtotime(strftime("%Y-", strtotime($datenow."+$i days"))."01-01T00:00")) / 86400) + 10;
		//Calculate sun declination angle
		$dayCoefficient_rad = (360/365.25) * $daysSinceWinter * (M_PI/180);
		$sunDeclination = -23.44*cos($dayCoefficient_rad);
		$sunDeclination_rad = $sunDeclination * (M_PI/180);
		//Calculate sunshine length
		$sunShine_rad = acos(-tan($lat_rad) * tan($sunDeclination_rad));
		$sunShine_deg = $sunShine_rad * (180/M_PI);
		$sunShine_time = (2 * $sunShine_deg / 360);
		$sunShine_total += $sunShine_time;
	}
	$sunShine_days = floor($sunShine_total);
	$sunShine_hours = floor(($sunShine_total - $sunShine_days) * 24);
	$sunShine_minutes = floor(((($sunShine_total - $sunShine_days) * 24 ) - $sunShine_hours) * 60);
	$sunShine_seconds = floor(((((($sunShine_total - $sunShine_days) * 24) - $sunShine_hours) * 60) - $sunShine_minutes) * 60);
	
	$sunShine_days_percent = floor(($sunShine_days / 365) * 100);
	$sunShine_hours_percent = floor(($sunShine_hours / 24) * 100);
	$sunShine_minutes_percent =	floor(($sunShine_minutes / 60) * 100);
	$sunShine_seconds_percent = floor(($sunShine_seconds / 60) * 100);

	$sunShine_hours_total = $sunShine_total * 24;

	$data = [$sunShine_days, $sunShine_hours, $sunShine_minutes, $sunShine_seconds, $sunShine_days_percent, $sunShine_hours_percent, $sunShine_minutes_percent, $sunShine_seconds_percent, $sunShine_hours_total];

	echo json_encode($data);
?>