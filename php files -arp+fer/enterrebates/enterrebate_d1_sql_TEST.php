<?php
session_start();

  // Create connection
    $dbconnect = mysqli_connect("127.0.0.1", "root", "", "dealer_one");
    
    // Check connection
    if ($dbconnect->connect_error) 
    {
        die("Connection failed: " . $dbconnect->connect_error);
    } 

$model = filter_input(INPUT_POST, 'model');
$rebate_amt = filter_input(INPUT_POST, 'rebate_amt');
$start_date = filter_input(INPUT_POST, 'start_date');
$end_date= filter_input(INPUT_POST, 'end_date');



$sql1 = "INSERT INTO rebate1 (model, rebate_amt, start_date, end_date)
VALUES ('$model', '$rebate_amt', '$start_date', '$end_date')";


    $email = $_POST['email'];
    $name = $_POST['fname'];

if ($dbconnect->query($sql1) === TRUE) 
    {
        $_SESSION['name'] = $email;
        $_SESSION['fname'] = $name;
        header('Location: enterrebate_d1_page_TEST.php');
    } else 
    {
        //echo "Something went wrong" . "<br>" . $dbconnect->error;
        header('Location: index.php');
    }
$dbconnect->close();
?>