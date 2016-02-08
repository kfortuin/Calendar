<?php 
	require "../includes/connect.php";
	if ($_SERVER["REQUEST_METHOD"] == "POST" & isset($_POST['submit']))
		{ 

	// Prepare variables and strip of any tags/slashes
	$name = strip_tags($_POST['name']);
	$day = strip_tags($_POST['day']);
	$month = strip_tags($_POST['month']);
	$year = strip_tags($_POST['year']);
	$id = strip_tags($_GET['id']);

	$name = stripslashes($name);
	$day = stripslashes($day);
	$month = stripslashes($month);
	$year = stripslashes($year);
	$id = stripslashes($id);

	$name = $db->escape_string($name);
	$day = $db->escape_string($day);
	$month = $db->escape_string($month);
	$year = $db->escape_string($year);
	$id = $db->escape_string($id);

	// Prepare statement and execute

		$query = "UPDATE birthdays SET person='$name', day=$day, month_id=$month, year=$year WHERE id=$id";

		$result = $db->query($query);
	// Go back to home page
		header("Location: ../index.php");
		// exit();
	}else{
		header("Location: ../index.php");
	}
	
	var_dump($query)
?>