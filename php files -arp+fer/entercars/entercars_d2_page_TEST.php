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
        
        <div id="enter car">
            <form method="post" action="entercars_d2_sql_TEST.php">
                <table border="0">
                    <tr>
                    <td for="vehicle_no" id="cell">Vehicle NO:</td>
                    <td><input type="text" name="vehicle_no" id="vehicle_no" placeholder="Enter vehicle no for car" required></td>
                </tr>
                <tr>
                    <td for="model" id="cell">Model:</td>
                    <td><input type="text" name="model" id="model" placeholder="Enter model of car" required></td>
                </tr>
                <tr>
                    <td for="color" id="cell">Color:</td>
                    <td><input type="text" name="color" id="color" placeholder="Enter color of car" required></td>
                </tr>
                    <tr>
                        <td for="autotrans" id="cell">Autotrans:</td>
                        <td><input type="text" name="autotrans" id="autotrans" placeholder="Enter autotrans of car" required></td>
                    </tr>
                    <tr>
                        <td for="warehouse" id="cell">Warehouse:</td>
                        <td><input type="text" name="warehouse" id="warehouse" placeholder="Enter warehouse" required></td>
                    </tr>
                     <tr>
                        <td for="financed" id="cell">Financed:</td>
                        <td><input type="text" name="financed" id="financed" placeholder="Was this purchase financed? " required></td>
                    </tr>
                    <tr id="submit">
                        <td>&nbsp;</td>
                        <td><input type="submit" name="submit" value="Enter Car">
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
