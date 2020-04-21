<?php
session_start();

  // Create connection
    $dbconnect = mysqli_connect("127.0.0.1", "root", "", "dealer_two");
    
    // Check connection
    if ($dbconnect->connect_error) 
    {
        die("Connection failed: " . $dbconnect->connect_error);
    } 

$deal_no = filter_input(INPUT_POST, 'deal_no');
$rebate_no = filter_input(INPUT_POST, 'rebate_no');
$sale_no = filter_input(INPUT_POST, 'sale_no');
$buyer_no = filter_input(INPUT_POST, 'buyer_no');
$vehicle_no= filter_input(INPUT_POST, 'vehicle_no');
$amount= filter_input(INPUT_POST, 'amount');
$fin_amt= filter_input(INPUT_POST, 'fin_amt');
$date= filter_input(INPUT_POST, 'date');




$sql1 = "INSERT INTO deal (deal_no, rebate_no, sale_no, buyer_no,vehicle_no,amount,fin_amt,date)
VALUES ('$deal_no','$rebate_no', '$sale_no', '$buyer_no', '$vehicle_no', '$amount', '$fin_amt', '$date' )";

$sql2= "DELETE FROM autos where vehicle_no =$vehicle_no";



   
if (($dbconnect->query($sql1) === TRUE) && ($dbconnect->query($sql2) === TRUE))
    {
       
        header('Location: entertransaction_d2_view_TEST.php');
    } else 
    {
        echo "Something went wrong" . "<br>" . $dbconnect->error;
       // header('Location: index.php');
    }

   
    $dbconnect->close();
?>
