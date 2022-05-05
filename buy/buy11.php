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
                        <a href="home.html">Home</a>
                        <a href="buy.php">Buy</a>
                    </li>
                    <li>
                        <a href="sell.html">Sell</a>
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
              <nav>
                  <ul>
                      <li>
                          <a href="buy1.html">Home</a>
                      </li>
                      <li>
                          <a href="buy.php">Buy</a>
                      </li>
                      <li>
                          <a href="sell.html">Sell</a>
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
            <p>&nbsp;</p>
            <div id="type">
                <label for="type">Resource Type: </label>
                <select name="rtype" id="rtype">
                    <option value="textbook">Textbooks</option>
                    <option value="notes">Notes</option>
                    <option value="gr">Released GRs</option>

                </select>
            <p>&nbsp;</p>
            <h2>Listings Available:</h2>
            <div id="queries"><div>
	    <?php
	       include 'credentials.php';
		     $connection = new mysqli($server, $username, $password, "student")
		        or die("Couldn't connect to database!"); ?>

        </div>
    </div>
    <script src="script.js"></script>
    <body>
</html>
