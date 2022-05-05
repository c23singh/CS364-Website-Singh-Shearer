<?php 
$server = "localhost";
$username = "student";
$password = "CompSci364";

$connection = new mysqli($server, $username, $password, "student")
	or die("Couldn't connect to database!");

$sql = <<<SQL
CREATE TABLE Items (
	ItemID NUMERIC(3, 0) PRIMARY KEY,
	CourseID VARCHAR(10),
	Type VARCHAR(20),
	Price NUMERIC(5, 2),
	SellerID NUMERIC(3, 0),
	FOREIGN KEY SellerID REFERENCES Seller(SellerID)
);

CREATE TABLE Textbook
	Title VARCHAR(50),
	Author VARCHAR(50),
	ItemID Numeric(3,0) PRIMARY KEY,
	FOREIGN KEY(ItemID) REFERENCES Items (ItemID)
);

CREATE TABLE GR
	Name VARCHAR(50),
	Author VARCHAR(50),
	Year NUMERIC(4, 0),
	ItemID Numeric(3,0) PRIMARY KEY,
	FOREIGN KEY(ItemID) REFERENCES Items (ItemID)
);

CREATE TABLE Notes
	Name VARCHAR(50),
	Author VARCHAR(50),
	ItemID Numeric(3,0) PRIMARY KEY,
	FOREIGN KEY(ItemID) REFERENCES Items (ItemID)
);

CREATE TABLE Seller
	Name VARCHAR(50),
	Phone NUMERIC(10, 0),
	Email = VARCHAR(50),
	SellerID NUMERIC(3, 0) PRIMARY KEY
);


SQL;
?>
