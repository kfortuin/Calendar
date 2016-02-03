<?php 
	require "../includes/connect.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (isset($_POST["confirmed"]))
		{
			if (!empty($_GET["id"]) & (is_numeric($_GET["id"])))
			{
				$id = $db->escape_string($_GET["id"]);

				$query = "DELETE FROM birthdays WHERE id=$id";

				$result = $db->query($query);
				header("Location: ../index.php");
			}
			
		}
		else
		{
			if (isset($_POST["cancelled"]))
			{
				header("Location: ../index.php");
			}
		}
	}
	else
	{
		echo "There was an error displaying your item";
	}