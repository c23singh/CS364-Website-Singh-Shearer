<?php
include 'credentials.php';

$connection = new mysqli($server, $username, $password, "student")
	or die("Couldn't connect to database!");

$statement = $connection->prepare("SELECT * FROM Textbook INNER JOIN Items ON Textbook.ItemID = Items.ItemID ORDER BY RAND();");

$statement->execute();
$statement->bind_result($name, $phone, $email, $a, $d, $s, $n, $y);

while($statement->fetch()) {
	echo "Data is ".$name."<br />";
}

?>
