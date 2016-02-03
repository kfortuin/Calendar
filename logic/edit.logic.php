<?php 
	require "../includes/connect.php";
	$name = strip_tags($_POST['name']);
	$day = strip_tags($_POST['day']);
	$month = strip_tags($_POST['month']);
	$year = strip_tags($_POST['year']);
	$id = strip_tags($_GET['id']);

	$name = stripslashes($name);
	$day = stripslashes($day);
	$month = stripslashes($month);
	$year = stripslashes($year);
	$id = stripslashes($_GET['id']);

	$name = $db->escape_string($name);
	$day = $db->escape_string($day);
	$month = $db->escape_string($month);
	$year = $db->escape_string($year);
	$id = $db->escape_string($_GET['id']);

	if ($_SERVER["REQUEST_METHOD"] == "POST" & isset($_POST['submit']))
		{ 

			$query = "UPDATE birthdays SET person='$name', day=$day, month_id=$month, year=$year WHERE id=$id";

			$result = $db->query($query);
			header("Location: ../index.php");
		}else{
			header("Location: ../index.php");
		}
	
	
	var_dump($query)
?>