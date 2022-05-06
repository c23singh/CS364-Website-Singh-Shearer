<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>USAFA Textbook Exchange</title>
        <link rel="stylesheet" href="style.css">
    </head>
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
            <h2>Create a Listing</h2>
            <?php
                include 'credentials.php';
                $connection = new mysqli($server, $username, $password, "student")
                    or die("Couldn't connect to database!");
                $iditem = rand(0, 999);
                $idseller = rand(0, 999);
                if(isset($_POST['submit'])){
                  if($_POST['type'] == 'textbook'){
                      $stone = $connection->prepare("INSERT INTO Items (ItemID, CourseID, Type, Price, SellerID) VALUES(?, ?, 'Textbook', ?, ?);");
                      $stone->bind_param('isdi', $iditem, $_POST['classCode'], $_POST['price'], $idseller);
                      $stone->execute();
                      $sttwo = $connection->prepare("INSERT INTO Textbook (Title, Author, ItemID) VALUES(?, ?, ?);");
                      $sttwo->bind_param('ssi', $_POST['title'], $_POST['author'], $iditem);
                      $sttwo->execute();
                      $stthree = $connection->prepare("INSERT INTO Seller (Name, Phone, Email, SellerID) VALUES(?, ?, ?, ?);");
                      $stthree->bind_param('sssi', $_POST['Name'], $_POST['phone'], $_POST['email'], $idseller);
                      $stthree->execute();
                  } elseif ($_POST['type'] == 'notes') {
                      $stone = $connection->prepare("INSERT INTO Items (ItemID, CourseID, Type, Price, SellerID) VALUES(?, ?, 'Notes', ?, ?);");
                      $stone->bind_param('isdi', $iditem, $_POST['classCode'], $_POST['price'], $idseller);
                      $stone->execute();
                      $sttwo = $connection->prepare("INSERT INTO Notes (Name, Author, ItemID) VALUES(?, ?, ?);");
                      $sttwo->bind_param('ssi', $_POST['title'], $_POST['author'], $iditem);
                      $sttwo->execute();
                      $stthree = $connection->prepare("INSERT INTO Seller (Name, Phone, Email, SellerID) VALUES(?, ?, ?, ?);");
                      $stthree->bind_param('sssi', $_POST['Name'], $_POST['phone'], $_POST['email'], $idseller);
                      $stthree->execute();
                  } elseif ($_POST['type'] == 'gr') {
                      $stone = $connection->prepare("INSERT INTO Items (ItemID, CourseID, Type, Price, SellerID) VALUES(?, ?, 'GR', ?, ?);");
                      $stone->bind_param('isdi', $iditem, $_POST['classCode'], $_POST['price'], $idseller);
                      $stone->execute();
                      $sttwo = $connection->prepare("INSERT INTO GR (Name, Author, Year,  ItemID) VALUES(?, ?, 1969,?);");
                      $sttwo->bind_param('ssi', $_POST['title'], $_POST['author'], $iditem);
                      $sttwo->execute();
                      $stthree = $connection->prepare("INSERT INTO Seller (Name, Phone, Email, SellerID) VALUES(?, ?, ?, ?);");
                      $stthree->bind_param('sssi', $_POST['Name'], $_POST['phone'], $_POST['email'], $idseller);
                      $stthree->execute();
                  } else {
                    echo "Unkown Error Occured";
                  }
                }
            ?>
            <form action="" method="POST">
                <label for="name">Your First Name: </label></br>
                <input type="text" pattern="[a-zA-Z ]{0,50}" id="name" name="name" required><br>
                <label for="phone">Phone (Do not include parentheses or hyphens): </label></br>
                <input type="text" pattern="[0-9]{0,10}" id="phone" name="phone" required><br>
                <label for="emailAddress">Email: </label></br>
		            <input type="email" maxlength="50" id="emailAddress" name="emailAddress" required><br>
                <p>&nbsp;</p>
                <label for="title">Title (Leave out special characters):</label></br>
                <input type="text" pattern="[a-zA-Z-0-9 ]{0,75}" id="title" name="title" required><br>
                <p>&nbsp;</p>
                <label for="author">Author: </label></br>
                <input type="text" pattern="[a-zA-Z ]{0,50}" id="author" name="author" required><br>
                <p>&nbsp;</p>
                <label for="classCode">Class Code (ex: CS364): </label></br>
                <input type="text" pattern="[a-zA-Z-0-9 ]{0,10}" id="classCode" name="classCode" required><br>
                <p>&nbsp;</p>
                <label for="price">Price (Do not include dollar sign): </label></br>
                <input type="number" id="price" name="price" required min="0" max="250"><br>
                <p>&nbsp;</p>
                <p>Type:</p>
                <input type="radio" id="textbook" name="type" value="textbook" required>
                <label for="textbook">Textbook</label><br>
                <input type="radio" id="notes" name="type" value="notes" required>
                <label for="notes">Notes</label><br>
                <input type="radio" id="gr" name="type" value="gr" required>
                <label for="gr">Released GRs</label><br>
                <p>&nbsp;</p>
                <input type="submit" name="submit" value="Submit">
            </form>

        </div>
    </div>
</html>
