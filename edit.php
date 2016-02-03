<?php
	require "includes/connect.php";

	$name = $_GET['name'];
	$day = $_GET['day'];
	$month = $_GET['month'];
	$year = $_GET['year'];
	$id = $_GET['id'];
?>


<!doctype html>

<html>
	<head>
		<title>Birthdaycalendar</title>
        <link href="css/main.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>    
		<form action="logic/edit.logic.php?id=<?=$id?>" method="post">
		<input type="text" name="name" value="" id="name" placeholder="<?=$name?>">

		<select name="day" id="day">
			<?php 
				for ($newday = 1; $newday <=31; $newday++)
				{
					if ($newday == $day){
						echo "<option value='$newday' selected='selected'>$newday</option>";
					}else{
						echo "<option value='$newday'>$newday</option>";
					}
				} 
			?>
		</select>

		<select name="month">
			<?php
				for ($newmonth = 1; $newmonth <=12; $newmonth++) 
				{
					if ($newmonth == $month)
					{
						echo "<option value='newmonth' selected='selected'>$newmonth</option>";
					}else{
						echo "<option value='$newmonth'>$newmonth</option>";
					}
				}
			?>
		</select>

		<select name="year" id="year">
			<?php 
				for ($newyear = 1900; $newyear <=2016; $newyear++)
				{
					if ($newyear == $year)
					{
						echo "<option value='newyear' selected='selected'>$newyear</option>";
					}else{
						echo "<option value='$newyear'>$newyear</option>";
					}
				} 
			?>
		</select>
		<br>
		<input type="submit" name="submit" value="Add">
		<input type="submit" name="back" value="Back">
	</form>

	</body>
</html>