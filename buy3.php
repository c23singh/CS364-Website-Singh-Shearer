<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>USAFA Textbook Exchange</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div id = "webpage">
        <div id = "backdrop">
            <h1>
                USAFA <span class = "offcolor"> Textbooks</span>
            </h1>
            <h3>Forget the bookshop</h3>
        </div>
        <div  id = "navigation">
            <nav>
                <ul>
                    <li>
                        <a href="home.html">Home</a>
                    </li>
                    <li>
                        <a href="buy0.php">Buy</a>
                    </li>
                    <li>
                        <a href="sell.php">Sell</a>
                    </li>
                    <li>
                        <a href="account.html">Account</a>
                    </li>
                    <li>
                        <a href="checkout.html">Checkout</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div id="content">
            <div id="sortby">
              <h3>Sort by</h3>
              <nav>
                  <a href="buy0.php">Sort by Alphabetical</a>
                  <a href="buy3.php">Sort by Class ID</a>
                  <a href="buy6.php">Sort by Price</a>
              </nav>
            </div>
            <div id="rtype">
              <h3>Resource Type</h3>
              <nav>
                  <a href="buy3.php">Textbook</a>
                  <a href="buy4.php">Notes</a>
                  <a href="buy5.php">Released GRs</a>
              </nav>
            </div>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
	    <?php
	       include 'credentials.php';
		     $connection = new mysqli($server, $username, $password, "student")
		        or die("Couldn't connect to database!");
         $statement = $connection->prepare("SELECT * FROM Textbook INNER JOIN Items ON Textbook.ItemID = Items.ItemID ORDER BY CourseID ASC;");

         $statement->execute();
         $statement->bind_result($title, $author, $id, $id2, $course, $type, $price, $seller);

         while($statement->fetch()) {
         	echo "<h4>Title: ".$title." - Author: ".$author." - Course: ".$course." - Type: ".$type." - Price: $".$price."</h4><br />";
         }
      ?>

        </div>
    </div>
    <body>
</html>
