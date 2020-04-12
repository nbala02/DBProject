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
        
<!-------- dowload table's pretty design here https://colorlib.com/wp/template/fixed-header-table/--> 
        
        
    </head>
    
    <body>
        <?php session_start();
         include('dbconnect.php');
        ?>
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
        
       
            
<!-- rebates in the database for dealer -->
     <div class="limiter">
		<div class="container">
			<div class="wrap">
				<div class="table100 ver1 m-b-110">
					<div class="table100-body js-pscroll">
						<table> 
                            <thead class="table100-head">
								<tr class="row100 head">
                                    <th class="cell100 column2">Rebate No </th>
                                    <th class="cell100 column2">Model</th>
                                    <th class="cell100 column2">Rebate Amount</th>
                                    <th class="cell100 column2">Start Date</th>
                                    <th class="cell100 column2">End Date</th>
        
                                    
								</tr>
							</thead>
                            
							<tbody>
                                 
        <?php
        
            // Create connection
            $dbconnect = mysqli_connect("127.0.0.1", "root", "", "dealer_one");
    
            // Check connection
            if ($dbconnect->connect_error) 
            {
                    die("Connection failed: " . $dbconnect->connect_error);
            } 
            
            $query = "SELECT * FROM rebate1 ";
                                
             $output = $dbconnect->query($query);
            $sql3 = "UPDATE rebate1 SET rebate_no='expired' WHERE ('$end_date' < CURRENT_DATE  )";

    

      

        
        // Query specified database for value
        if(($output->num_rows != 0)&& ($dbconnect->query($sql3) === TRUE)){
            
            while($result = mysqli_fetch_assoc($output)) {


                 ?>

                                <form method=POST >
                                    <tr class="row100 body">
                                        <td class="cell100 column2"><?php echo "<input style=text-align:center;type=text name=rebate_no value='".$result['rebate_no']."'>"?></td>
                                        <td class="cell100 column2"><?php echo "<input style=text-align:center;type=text name=model
                                        value='".$result['model']."'>"?></td>
                                        <td class="cell100 column2"><?php echo "<input style=text-align:center;type=text name=rebate_amt value='".$result['rebate_amt']."'>"?></td>
                                        <td class="cell100 column2"><?php echo "<input style=text-align:center;type=text name=start_date value='".$result['start_date']."'>"?></td>
                                        <td class="cell100 column2"><?php echo "<input style=text-align:center; type=text name=end_date
                                    value='".$result['end_date']."'>"?>\</td>
    

                                    </tr>
                                </form>
                               <?php } } else{ echo '<span class="login100-form-title p-b-33">No rebates</span>';}?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
    
        
        
        
        
        
        <footer>
            <h3>All Rights Reserved, Copyright &copy; 2020</h3>
        </footer>
    </body>
</html>

<!-- <h2 style="text-align: center; font-size: 100px; padding: 120px; background: black; color: white;">Contact Information</h2> -->