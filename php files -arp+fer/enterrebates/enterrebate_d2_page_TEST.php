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
        
        <div id="enter rebate">
            <form method="post" action="enterrebate_d2_sql_TEST.php">
                <table border="0">
                <tr>
                    <td for="rebate_no" id="cell">Rebate No:</td>
                    <td><input type="text" name="rebate_no" id="rebate_no" placeholder="Enter rebate_no" required></td>
                </tr>
                <tr>
                    <td for="model" id="cell">Model:</td>
                    <td><input type="text" name="model" id="model" placeholder="Enter model of car" required></td>
                </tr>
                <tr>
                    <td for="rebate_amt" id="cell">Rebate Amount:</td>
                    <td><input type="text" name="rebate_amt" id="rebate_amt" placeholder="Enter amount for Rebate" required></td>
                </tr>
                    <tr>
                        <td for="start_date" id="cell">Start Date:</td>
                        <td><input type="text" name="start_date" id="start_date" placeholder="Enter start date for rebate" required></td>
                    </tr>
                     <tr>
                        <td for="end_date" id="cell">End Date:</td>
                        <td><input type="text" name="end_date" id="end_date" placeholder="Enter end date for rebate" required></td>
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