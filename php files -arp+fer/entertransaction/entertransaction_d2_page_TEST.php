<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Sign In">
        <title>Sign In</title>
        <link rel="stylesheet" type= text/css href="main.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito|Pontano+Sans|Poppins:500" rel="stylesheet">
    </head>
    <body>
        <?php session_start(); ?>
        
        <header>
            <div id="logo"><a><img src="images/logo.png"></a></div>
            <nav>
                <ul>
                    <?php
                        if(isset($_SESSION['wholesaler']) || isset($_SESSION['name']))
                        {
                            echo '<li><a href="logout.php">Logout</a></li>';
                            echo '<li><a href=# style=text-decoration:none;>Welcome ' . $_SESSION['fname'] . '</a></li>';
                        } else
                        {
                            echo '<li><a href="signIn.php">Sign In</a></li>';
                            echo '<li><a href="registerPage.php">Register</a></li>';
                        }
                    ?>
                    <li><a>|</a></li>
                    <li><a href="contactUs.php">Contact Us</a></li>
                    <li><a href="findDealer.php">Find Dealer</a></li>
                    <li><a href="vehicles.php">Vehicles</a></li>
                    <li><a href="index.php">Home</a></li>
                </ul>
            </nav>
            <section>
                <div>
                    <img class="center-top" src="images/registerBanner.png" style="width: 100%; height: 230px; border-top: red 6px solid;">
                </div>
            </section>
        </header>
        
        <div id="enter deal">
            <form method="post" action="entertransaction_d2_sql_TEST.php">
                <table border="0">
                 <tr>
                    <td for="deal_no" id="cell">Dealer No:</td>
                    <td><input type="text" name="deal_no" id="deal_no" placeholder="Enter Dealer No" required></td>
                </tr>
                <tr>
                    <td for="rebate_no" id="cell">Rebate No:</td>
                    <td><input type="text" name="rebate_no" id="rebate_no" placeholder="Enter Rebate No" required></td>
                </tr>
                <tr>
                    <td for="sale_no" id="cell">Sales Representative No:</td>
                    <td><input type="text" name="sale_no" id="sale_no" placeholder="Enter Representative No" required></td>
                </tr>
                    <tr>
                        <td for="buyer_no" id="cell">Buyer No:</td>
                        <td><input type="text" name="buyer_no" id="buyer_no" placeholder="Enter Buyer No" required></td>
                    </tr>
                     <tr>
                        <td for="vehicle_no" id="cell">Vehicle No:</td>
                        <td><input type="text" name="vehicle_no" id="vehicle_no" placeholder="Enter Vehicle No" required></td>
                    </tr>
                    <tr>
                        <td for="amount" id="cell">Amount:</td>
                        <td><input type="text" name="amount" id="amount" placeholder="Enter Amount" required></td>
                    </tr>
                    <tr>
                        <td for="fin_amt" id="cell">Final Amount:</td>
                        <td><input type="text" name="fin_amt" id="fin_amt" placeholder="Enter Final Amount" required></td>
                    </tr>
                    <tr>
                        <td for="date" id="cell">Date:</td>
                        <td><input type="text" name="date" id="date" placeholder="Enter Date" required></td>
                    </tr>
                  
                    <tr id="submit">
                        <td>&nbsp;</td>
                        <td><input type="submit" name="submit" value="Enter Rebate">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <footer>
            <h3>All Rights Reserved, Copyright &copy; 2020</h3>
        </footer>
    </body>
</html>

<!-- <h2 style="text-align: center; font-size: 100px; padding: 120px; background: black; color: white;">Contact Information</h2> -->