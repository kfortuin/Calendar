<?php 
	require "../includes/connect.php";
if ($_SERVER['REQUEST_METHOD'] == "POST" & isset($_POST["submit"]))
	
{
	// Prepare data and strip variables of any tags and slashes
	$name = strip_tags($_POST['name']);
	$day = strip_tags($_POST['day']);
	$month = strip_tags($_POST['month']);
	$year = strip_tags($_POST['year']);

	$name = stripslashes($name);
	$day = stripslashes($day);
	$month = stripslashes($month);
	$year = stripslashes($year);

	$name = $db->escape_string($name);
	$day = $db->escape_string($day);
	$month = $db->escape_string($month);
	$year = $db->escape_string($year);

	// Prepare query and execute
	$query = "INSERT INTO birthdays (person, day, month_id, year) VALUES ('$name', $day, $month, $year)";
	$result = $db->query($query);

	// Go back to home page
	header("Location: ../index.php");
	exit();
}else{
	header("Location: ../index.php");
}

?>




