<?php 
	require "includes/connect.php";

$query = "	SELECT * FROM months ORDER BY id";
$result = $db->query($query);

$months = $result->fetch_all(MYSQLI_ASSOC)

?>

<!doctype html>

<html>
	<head>
		<title>Birthdaycalendar</title>
        <link href="css/main.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>    
	<form action="logic/create.logic.php" method="post">
		<input required type="text" autocomplete="off" name="name" id="name" placeholder="Who's the lucky one?">

		<select required name="day" id="day">
		<?php for ($day = 1; $day <=31; $day++)
		{
			echo "<option value='$day'>$day</option>";
		} 
		?>
		</select>

		<select required name="month">
			<?php
				foreach ($months as $month): 
			?>
				<option value="<?=$month['id']?>"><?=$month['name']?></option>
			<?php 
				endforeach;
			?>
		</select>

		<select required name="year" id="year">
		<?php for ($year = 1900; $year <=2016; $year++)
		{
			echo "<option value='$year'>$year</option>";
		} 
		?>
		</select>
		<br>
		<input type="submit" name="submit" value="Add">
		<input type="submit" name="back" value="Back">
	</form>


	
	</body>
</html>