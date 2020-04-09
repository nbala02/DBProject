<?php
session_start();

  // Create connection
    $dbconnect = mysqli_connect("127.0.0.1", "root", "", "dealer_one");
    
    // Check connection
    if ($dbconnect->connect_error) 
    {
        die("Connection failed: " . $dbconnect->connect_error);
    } 

$serial_no = filter_input(INPUT_POST, 'serial_no');
$model = filter_input(INPUT_POST, 'model');
$color = filter_input(INPUT_POST, 'color');
$autotrans = filter_input(INPUT_POST, 'autotrans');
$warehouse = filter_input(INPUT_POST, 'warehouse');



$sql1 = "INSERT INTO cars (serial_no, model, color, autotrans, warehouse)
VALUES ('$serial_no', '$model', '$color', '$autotrans', '$warehouse')";


    $email = $_POST['email'];
    $name = $_POST['fname'];

if ($dbconnect->query($sql1) === TRUE) 
    {
        $_SESSION['name'] = $email;
        $_SESSION['fname'] = $name;
        header('Location: entercars_page_TEST.php');
    } else 
    {
        //echo "Something went wrong" . "<br>" . $dbconnect->error;
        header('Location: index.php');
    }
$dbconnect->close();
?>