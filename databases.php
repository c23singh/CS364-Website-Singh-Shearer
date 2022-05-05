<?php 
$server = "localhost";
$username = "student";
$password = "CompSci364";

$connection = new mysqli($server, $username, $password, "student")
	or die("Couldn't connect to database!");


// Creates Database in possibly the worst way possible, but I have no idea how to do this
$connection->query("CREATE TABLE IF NOT EXISTS Seller (Name VARCHAR(50), Phone NUMERIC(10, 0), Email VARCHAR(50), SellerID NUMERIC(3, 0) PRIMARY KEY);");
$connection->query("INSERT INTO Seller (Name, Phone, Email, SellerID) VALUES ('Alex Singh', 2144770401, 'c23singh@usafa.edu', 123),('Jon Shearer', 2341234123, 'c23shearer@usafa.edu', 321);");
$connection->query("CREATE TABLE IF NOT EXISTS Items (ItemID NUMERIC(3, 0) PRIMARY KEY, CourseID VARCHAR(10), Type VARCHAR(20), Price NUMERIC(5, 2), SellerID NUMERIC(3, 0));");
$connection->query("INSERT INTO Items (ItemID, CourseID, Type, Price, SellerID) VALUES(999, 'CS380', 'Textbook', 14.69, 123),(998, 'CS364', 'Textbook', 69.69, 321),(997, 'Math243', 'Notes', 420.69, 123),(996, 'Chem200', 'GR', 4.20, 321);");
$connection->query("CREATE TABLE IF NOT EXISTS Textbook (Title VARCHAR(50), Author VARCHAR(50), ItemID Numeric(3,0) PRIMARY KEY, FOREIGN KEY (ItemID) REFERENCES Items (ItemID));");
$connection->query("INSERT INTO Textbook (Title, Author, ItemID) VALUES('Algorithms Book', 'Captain K', 999),('Databases', 'Johnny Depp', 998);");
$connection->query("CREATE TABLE IF NOT EXISTS GR (Name VARCHAR(50),Author VARCHAR(50),Year NUMERIC(4, 0),ItemID Numeric(3,0) PRIMARY KEY,FOREIGN KEY(ItemID) REFERENCES Items (ItemID));");
$connection->query("INSERT INTO GR (Name, Author, Year, ItemID) VALUES ('Chemistry GR3', 'Jon Shearer', 1960, 996);");
$connection->query("CREATE TABLE IF NOT EXISTS Notes (Name VARCHAR(50),Author VARCHAR(50),ItemID Numeric(3,0) PRIMARY KEY,FOREIGN KEY(ItemID) REFERENCES Items (ItemID));");
$connection->query("INSERT INTO Notes (Name, Author, ItemID) VALUES ('Block 1 Calc 3 Notes', 'Alex Singh', 997);");


$connection->close();
?>
