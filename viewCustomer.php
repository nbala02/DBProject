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
    
 <!-------- dowload table's pretty design here https://colorlib.com/wp/template/fixed-header-table/--> 
    
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
                        <div class="section_title">Add Sales Personnel</div>
                        <div class="section_subtitle">Use the form</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
   <!-- Cars in the database for dealer -->
     <div class="limiter">
		<div class="container">
			<div class="wrap">
				<div class="table100 ver1 m-b-110">
					<div class="table100-body js-pscroll">
						<table> 
                            <thead class="table100-head">
								<tr class="row100 head">
                                    <th class="cell100 column1">Representative No.</th>
                                    <th class="cell100 column2">Name</th>
                                    <th class="cell100 column2">Address</th>
                                    <th class="cell100 column2">Phone</th>
                                    <th class="cell100 column2">Base salary</th>
                                    <th class="cell100 column2">Year-to-date sales</th>
                                    <th class="cell100 column2">Commission</th>
                                    
								</tr>
							</thead>
                            
							<tbody>
                                 
        <?php

                                
        if(isset($_SESSION['ldmanager1']))
    {
        $dbconnect = mysqli_connect("127.0.0.1", "root", "", "dealer_one");
            $query1 = "SELECT * FROM representative ";
             $output1 = $dbconnect->query($query1);
         // var_dump($output);
        $location = "D1";
            
            
    } 
                                
                                
                                
    
else if(isset($_SESSION['ldmanager2']))
            
                    
            
    {
        $dbconnect = mysqli_connect("127.0.0.1", "root", "", "dealer_two");
            
            $query2 = "SELECT * FROM sales_person ";
             $output2 = $dbconnect->query($query2);
          //var_dump($output);
       
        $location = "D2";
    }
        
    
                ?>
        // Query specified database for value
                                
         <?php                        
        if(($output1->num_rows != 0)){
            while($result = mysqli_fetch_assoc($output1)) {
           ?>
         
                               
                                <form method=POST >
                                    <tr class="row100 body">
                                        <td class="cell100 column1"><?php echo "<input style=text-align:center; type=text name=rep_no value='".$result['rep_no']."'>"?></td>
                                        
                                        <td class="cell100 column2"><?php echo "<input style=text-align:center;type=text name=name
                                        value='".$result['name']."'>"?></td>
                                        
                                        <td class="cell100 column2"><?php echo "<input style=text-align:center;type=text name=address
                                        value='".$result['address']."'>"?></td>
                                        
                                        <td class="cell100 column2"><?php echo "<input style=text-align:center;type=text name=phone value='".$result['phone']."'>"?></td>
                                        
                                        <td class="cell100 column2"><?php echo "<input style=text-align:center; type=text name=base_salary
                                        value='".$result['base_salary']."'>"?>\</td>
                                        
                                        <td class="cell100 column2"><?php echo "<input style=text-align:center; type=text name=ytd_sales
                                        value='".$result['ytd_sales']."'>"?>\</td>
                                    
                                        <td class="cell100 column2"><?php echo "<input style=text-align:center; type=text name=comm
                                        value='".$result['comm']."'>"?>\</td>

                                    </tr>
                                </form>
                
                              <?php  } } else if(($output2->num_rows != 0)){ 
                                                 while($result = mysqli_fetch_assoc($output2)) {
                            ?>
                            
                                <form method=POST >
                                    <tr class="row100 body">
                                        <td class="cell100 column1"><?php echo "<input style=text-align:center; type=text name=sale_no value='".$result['sale_no']."'>"?></td>
                                        
                                        <td class="cell100 column2"><?php echo "<input style=text-align:center;type=text name=name
                                        value='".$result['name']."'>"?></td>
                                        
                                        <td class="cell100 column2"><?php echo "<input style=text-align:center;type=text name=address
                                        value='".$result['address']."'>"?></td>
                                        
                                        <td class="cell100 column2"><?php echo "<input style=text-align:center;type=text name=phone value='".$result['phone']."'>"?></td>
                                        
                                        <td class="cell100 column2"><?php echo "<input style=text-align:center; type=text name=comm
                                        value='".$result['comm']."'>"?>\</td>
                                        
                                        <td class="cell100 column2"><?php echo "<input style=text-align:center; type=text name=base_salary
                                        value='".$result['base_salary']."'>"?>\</td>
                                        
                                        <td class="cell100 column2"><?php echo "<input style=text-align:center; type=text name=ytdsales
                                        value='".$result['ytdsales']."'>"?>\</td>
                                        
                                        

                                    </tr>
                                </form>
            
              <?php } } else{ echo '<span class="login100-form-title p-b-33">No cars</span>';}?>
       
                                
            


        
                                
                                
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