<?php
session_start();

  // Create connection
    $dbconnect = mysqli_connect("127.0.0.1", "root", "", "dealer_one");
    
    // Check connection
    if ($dbconnect->connect_error) 
    {
        die("Connection failed: " . $dbconnect->connect_error);
    } 

$deal_no = filter_input(INPUT_POST, 'deal_no');
$rebate_no = filter_input(INPUT_POST, 'rebate_no');
$rep_no = filter_input(INPUT_POST, 'rep_no');
$customer_no = filter_input(INPUT_POST, 'customer_no');
$serial_no= filter_input(INPUT_POST, 'serial_no');
$amount= filter_input(INPUT_POST, 'amount');
$fin_amt= filter_input(INPUT_POST, 'fin_amt');
$date= filter_input(INPUT_POST, 'date');




$sql1 = "INSERT INTO transaction (deal_no,rebate_no, rep_no, customer_no, serial_no, amount, fin_amt, date)
VALUES ('$deal_no','$rebate_no', '$rep_no', '$customer_no', '$serial_no', '$amount', '$fin_amt', '$date' )";

    $email = $_POST['email'];
    $name = $_POST['fname'];

if ($dbconnect->query($sql1) === TRUE) 
    {
        $_SESSION['name'] = $email;
        $_SESSION['fname'] = $name;
        header('Location: entertransaction_d1_view_TEST.php');
    } else 
    {
        //echo "Something went wrong" . "<br>" . $dbconnect->error;
        header('Location: index.php');
    }

   
    $dbconnect->close();
?>
