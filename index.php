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
    <!-- Show items per month -->
<?php function showBirthdays($var = "1"){
        global $birthday;
        if($birthday['monthID'] == $var){?>
            <ul id="birthdays">
                <li id="item"><?= $birthday['day'] . ".  "  .
                        $birthday['person'] . " " . "(" .
                        $birthday['year'] . ") &nbsp&nbsp"?>
                        <a href="edit.php?id=<?=$birthday['birthdayID']?>&name=<?=$birthday['person']?>&day=<?=$birthday['day']?>&month=<?=$birthday['monthID']?>&year=<?=$birthday['year']?>">edit</a>
                        <a href="delete.php?id=<?=$birthday['birthdayID']?>">x</a> 
                </li>
            </ul>
            <?php }; return $birthday; 
            } 
        ?>


<!doctype html>

<html>
	<head>
		<title>Birthdaycalendar</title>
        <link href="css/main.css" rel="stylesheet" type="text/css">
	</head>
	
	<body> 
    <p id="add"><a href="create.php">+ Add item</a></p> 

    <h1>January</h1>  
        <?php foreach($birthdays as $birthday){showBirthdays("1");} ?>
    <h1>February</h1>  
        <?php foreach($birthdays as $birthday){showBirthdays("2");} ?>
    <h1>March</h1>  
        <?php foreach($birthdays as $birthday){showBirthdays("3");} ?>
    <h1>April</h1>  
        <?php foreach($birthdays as $birthday){showBirthdays("4");} ?>
    <h1>May</h1>  
        <?php foreach($birthdays as $birthday){showBirthdays("5");} ?>
    <h1>June</h1>  
        <?php foreach($birthdays as $birthday){showBirthdays("6");} ?>
    <h1>July</h1>  
        <?php foreach($birthdays as $birthday){showBirthdays("7");} ?>
    <h1>August</h1>  
        <?php foreach($birthdays as $birthday){showBirthdays("8");} ?>
    <h1>September</h1>  
        <?php foreach($birthdays as $birthday){showBirthdays("9");} ?>
    <h1>October</h1>  
        <?php foreach($birthdays as $birthday){showBirthdays("10");} ?>
    <h1>November</h1>  
        <?php foreach($birthdays as $birthday){showBirthdays("11");} ?>
    <h1>December</h1>  
        <?php foreach($birthdays as $birthday){showBirthdays("12");} ?>



	</body>
</html>