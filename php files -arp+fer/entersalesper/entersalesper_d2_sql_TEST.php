<?php
session_start();

  // Create connection
    $dbconnect = mysqli_connect("127.0.0.1", "root", "", "dealer_two");
    
    // Check connection
    if ($dbconnect->connect_error) 
    {
        die("Connection failed: " . $dbconnect->connect_error);
    } 

$sale_no = filter_input(INPUT_POST, 'sale_no');
$name = filter_input(INPUT_POST, 'name');
$address = filter_input(INPUT_POST, 'address');
$phone = filter_input(INPUT_POST, 'phone');
$comm = filter_input(INPUT_POST, 'comm');
$base_salary = filter_input(INPUT_POST, 'base_salary');
$ytd_sales = filter_input(INPUT_POST, 'ytdsales');



$sql1 = "INSERT INTO sales_person (sale_no, name, address, phone, comm, base_salary, ytdsales)
VALUES ('$sale_no', '$name', '$address', '$phone', '$comm', '$base_salary', '$ytdsales')";


    $email = $_POST['email'];
    $name = $_POST['fname'];

if ($dbconnect->query($sql1) === TRUE) 
    {
        $_SESSION['name'] = $email;
        $_SESSION['fname'] = $name;
        header('Location: entersalesper_d2_page_TEST.php');
    } else 
    {
        //echo "Something went wrong" . "<br>" . $dbconnect->error;
        header('Location: index.php');
    }
$dbconnect->close();
?>
