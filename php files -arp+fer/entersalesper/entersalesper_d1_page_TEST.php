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
            <form method="post" action="entersalesper_sql_TEST.php">
                <table border="0">
                    <tr>
                    <td for="rep_no" id="cell">Representative NO:</td>
                    <td><input type="text" name="rep_no" id="rep_no" placeholder="Enter number of representative" required></td>
                </tr>
                <tr>
                    <td for="name" id="cell">Name:</td>
                    <td><input type="text" name="name" id="name" placeholder="Enter name" required></td>
                </tr>
                <tr>
                    <td for="address" id="cell">Address:</td>
                    <td><input type="text" name="address" id="address" placeholder="Enter address" required></td>
                </tr>
                    <tr>
                        <td for="phone" id="cell">Phone NO:</td>
                        <td><input type="text" name="phone" id="phone" placeholder="Enter phone number" required></td>
                    </tr>
                    <tr>
                        <td for="base_salary" id="cell">Base Salary:</td>
                        <td><input type="base_salary" name="base_salary" id="base_salary" placeholder="Enter base salary" required></td>
                    </tr>
                    <tr>
                        <td for="ytd_sales" id="cell">Year-to-date:</td>
                        <td><input type="ytd_sales" name="ytd_sales" id="ytd_sales" placeholder="Enter Year-to-date sales" required></td>
                    </tr>
                    <tr>
                        <td for="comm" id="cell">Commission:</td>
                        <td><input type="comm" name="comm" id="comm" placeholder="Enter commission" required></td>
                    </tr>
                    <tr id="submit">
                        <td>&nbsp;</td>
                        <td><input type="submit" name="submit" value="Submit">
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
