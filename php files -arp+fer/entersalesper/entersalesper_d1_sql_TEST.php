<?php
session_start();

  // Create connection
    $dbconnect = mysqli_connect("127.0.0.1", "root", "", "dealer_one");
    
    // Check connection
    if ($dbconnect->connect_error) 
    {
        die("Connection failed: " . $dbconnect->connect_error);
    } 

$rep_no = filter_input(INPUT_POST, 'rep_no');
$name = filter_input(INPUT_POST, 'name');
$address = filter_input(INPUT_POST, 'address');
$phone = filter_input(INPUT_POST, 'phone');
$base_salary = filter_input(INPUT_POST, 'base_salary');
$ytd_sales = filter_input(INPUT_POST, 'ytd_sales');
$comm = filter_input(INPUT_POST, 'comm');



$sql1 = "INSERT INTO representative (rep_no, name, address, phone, base_salary, ytd_sales, comm)
VALUES ('$rep_no', '$name', '$address', '$phone', '$base_salary', '$ytd_sales', '$comm')";


    $email = $_POST['email'];
    $name = $_POST['fname'];

if ($dbconnect->query($sql1) === TRUE) 
    {
        $_SESSION['name'] = $email;
        $_SESSION['fname'] = $name;
        header('Location: entersalesper_d1_page_TEST.php');
    } else 
    {
        //echo "Something went wrong" . "<br>" . $dbconnect->error;
        header('Location: index.php');
    }
$dbconnect->close();
?>
