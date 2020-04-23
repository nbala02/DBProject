<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Wholesale Manager Account">
    <title>My Account</title>
    <link rel="icon" type="image/png" href="images/caricon.png">
    <link rel="stylesheet" type=text/css href="styles/main.css">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles/util.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>

<body>
    <?php session_start(); ?>

    <header>
        <div id="logo"><a><img src="images/logo.png"></a></div>
        <nav>
            <ul>
                <?php
                    if(isset($_SESSION['customer']) || isset($_SESSION['name']))
                    {
                        echo '<li><a href="logout.php">Logout</a></li>';
                        echo '<li><a href="custAccount.php" style=text-decoration:none;>Welcome ' . $_SESSION['fname'] . '</a></li>';
                    } else if(isset($_SESSION['wsmanager']) || isset($_SESSION['ldmanager1']) || isset($_SESSION['ldmanager2']) ||                    isset($_SESSION['salesrep1']) || isset($_SESSION['salesrep2']))
                    {
                        echo '<li><a href="logout.php">Logout</a></li>';
                        echo '<li><a href="empAccount.php" style=text-decoration:none;>Welcome ' . $_SESSION['fname'] . '</a></li>';
                    } else
                    {
                        echo '<li>';
                            echo '<a style=color:red;>Sign In</a>';
                                echo '<ul class="dropdown">';
                                    echo '<li><a href="signIn.php">Customers</a></li>';
                                    echo '<li><a href="empSignin.php">Employees</a></li>';
                                echo '</ul>';
                        echo '</li>';
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

        <div class="services">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="section_title">My Account</div>
                        <div class="section_subtitle">Choose what to do</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!--------------------------------------------- Wholesale Manager ------------------------------------------------->
    <?php if(isset($_SESSION['wsmanager'])) { ?>
    <div class="contact">
        <div class="container">
            <div class="row">
                <!-- Section 1 -->
                <div class="col-lg-6 contact_col">
                    <div class="info_form_container">
                        <div class="info_form_title">Vehicle Operations</div>
                        <div class="info_form" id="info_form">
                            <button class="info_form_button" onclick="window.location.href='#'">View Vehicles</button>
                            <!--Model is for global table-->
                            <button class="info_form_button" onclick="window.location.href='addModel.php'">Add Vehicle Model</button>
                            <button class="info_form_button" onclick="window.location.href='addPackages.php'">Add New Packages</button>
                        </div>
                    </div>
                </div>

                <!-- Section 2 -->
                <div class="col-lg-6 contact_col">
                    <div class="info_form_container">
                        <div class="info_form_title">Dealership Information</div>
                        <div class="info_form" id="info_form">
                            <button class="info_form_button" onclick="window.location.href='#'">Dealership Performance</button>
                            <button class="info_form_button" onclick="window.location.href='#'">Global Management</button>
                        </div>
                    </div>
                </div>
                
                <!-- Section 3 -->
                <div class="col-lg-6 contact_col">
                    <div class="info_form_container">
                        <div class="info_form_title">Customer Information</div>
                        <div class="info_form" id="info_form">
                            <button class="info_form_button" onclick="window.location.href='#'">View Potential Buyers</button>
                            <!--Customer personal info and vehicle bought and transaction receipt-->
                            <button class="info_form_button" onclick="window.location.href='#'">View Sales</button>
                            <!--Customer loan and finance info-->
                            <button class="info_form_button" onclick="window.location.href='#'">View Finance Info</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    
    <!--------------------------------------------- Local Manager ------------------------------------------------->
    <?php if(isset($_SESSION['ldmanager1']) || isset($_SESSION['ldmanager2'])) { ?>
    <div class="contact">
        <div class="container">
            <div class="row">
                <!-- Section 1 -->
                <div class="col-lg-6 contact_col">
                    <div class="info_form_container">
                        <div class="info_form_title">Vehicles</div>
                        <div class="info_form" id="info_form">
                            <button class="info_form_button" onclick="window.location.href='addVehicle.php'">Add Vehicle</button>
                            <button class="info_form_button" onclick="window.location.href='addRebate.php'">Add Rebates</button>
                            <button class="info_form_button" onclick="window.location.href='#'">Sales Information</button>
                        </div>
                    </div>
                </div>

                <!-- Section 2 -->
                <div class="col-lg-6 contact_col">
                    <div class="info_form_container">
                        <div class="info_form_title">Customers</div>
                        <div class="info_form" id="info_form">
                            <button class="info_form_button" onclick="window.location.href='#'">Customer Information</button>
                            <button class="info_form_button" onclick="window.location.href='#'">Transactions</button>
                            <button class="info_form_button" onclick="window.location.href='#'">Finance Information</button>
                        </div>
                    </div>
                </div>

                <!-- Section 3 -->
                <div class="col-lg-6 contact_col">
                    <div class="info_form_container">
                        <div class="info_form_title">Personnel Management</div>
                        <div class="info_form" id="info_form">
                            <button class="info_form_button" onclick="window.location.href='addRep.php'">Add Salesperson</button>
                            <button class="info_form_button" onclick="window.location.href='viewRep.php'">View Salesperson Information</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    
        <!--------------------------------------------- Sales Representative ------------------------------------------------->
    <?php if(isset($_SESSION['salesrep1']) || isset($_SESSION['salesrep2'])) { ?>
        <div class="contact">
        <div class="container">
            <div class="row">
                <!-- Section 1 -->
                <div class="col-lg-6 contact_col">
                    <div class="info_form_container">
                        <div class="info_form_title">Customers</div>
                        <div class="info_form" id="info_form">
                            <button class="info_form_button" onclick="window.location.href='#'">New Customer</button>
                            <button class="info_form_button" onclick="window.location.href='#'">Transactions</button>
                            <button class="info_form_button" onclick="window.location.href='#'">Schedule Maintenance</button>
                        </div>
                    </div>
                </div>

                <!-- Section 2 -->
                <div class="col-lg-6 contact_col">
                    <div class="info_form_container">
                        <div class="info_form_title">Personnel Information</div>
                        <div class="info_form" id="info_form">
                            <button class="info_form_button" onclick="window.location.href='viewRep.php'">View My Information</button>
                            <button class="info_form_button" onclick="window.location.href='#'">View Employees*REMOVE*</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    
    <footer>
        <h3>All Rights Reserved, Copyright &copy; 2020</h3>
    </footer>
</body>

</html>
