<?php 
require_once "includes/connect.php";
    
    //Logic

    $query = "  SELECT *, birthdays.month_id as month_id, 
                months.id as monthID, months.name as month,
                birthdays.id as birthdayID
                FROM birthdays
                LEFT JOIN months 
                ON months.id=birthdays.month_id
                ORDER BY monthID, day
            ";
    $result = $db->query($query);

    $birthdays = $result->fetch_all(MYSQLI_ASSOC);
    // asort($birthdays);

?>


<!doctype html>

<html>
	<head>
		<title>Birthdaycalendar</title>
        <link href="css/main.css" rel="stylesheet" type="text/css">
	</head>
	
	<body> 
    <p id="add"><a href="create.php">+ Add item</a></p>   
    <ul id="birthdays">
        <?php 
            foreach ($birthdays as $birthday): 
        ?>
        <li id="month"><?= $birthday['month'] ?> </li>
        <li id="item"><?= $birthday['day'] . ".  "  .
                $birthday['person'] . " " . "(" .
                $birthday['year'] . ") &nbsp&nbsp"?>
                <a href="edit.php?id=<?=$birthday['birthdayID']?>&name=<?=$birthday['person']?>&day=<?=$birthday['day']?>&month=<?=$birthday['monthID']?>&year=<?=$birthday['year']?>">edit</a>
                <a href="delete.php?id=<?=$birthday['birthdayID']?>">x</a> 
        </li>
    
        <?php 
            endforeach;
        ?>
    </ul>



	</body>
</html>