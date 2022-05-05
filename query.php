<?php
$server = "localhost";
$username = "student";
$password = "CompSci364";

$connection = new mysqli($server, $username, $password, "student")
	or die("Couldn't connect to database!");

$statement = $connection->prepare("SELECT * FROM Notes ORDER BY RAND();");

$statement->execute();
$statement->bind_result($name, $phone, $email);

while($statement->fetch()) {
	echo "Data is ".$name."<br />";
}

?>
