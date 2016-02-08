<?php 
	require "includes/connect.php";
	// $id = $birthday['birthdayID'];
		if (!empty($_GET["id"]) & (is_numeric($_GET["id"])))
		{

			$id = $db->escape_string($_GET["id"]);
			$query = "	SELECT *, 
						birthdays.person as persons, 
		                months.name as month,
		                birthdays.id as birthdaysID
						FROM birthdays 
						INNER JOIN months
						ON months.id=birthdays.month_id
						AND birthdays.id = $id
						";
			$result = $db->query($query);

			$person = $result->fetch_all(MYSQLI_ASSOC);
		}else{
			header("Location: index.php");
		}

	

?>

<html>
	<head>
		<title>Birthdaycalendar</title>
        <link href="css/main.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
	<form method="post" action="logic/delete.logic.php?id=<?=$id?>">
	<br>
	<p>Are you sure you want to delete the following item?</p>
	<br>
	<?php foreach ($person as $persons) : ?>
			<?=$persons['person'] 
			. ", born " 
			. " "
			. $persons['month']
			. " "
			. $persons['day']
			. ", "
			. $persons['year']
			?>
		<?php endforeach; ?>
		<br>
		<br>
		<input type="submit" name="confirmed" value="Yes">
		<input type="submit" name="cancelled" value="No">
	</form>
	</body>
</html>