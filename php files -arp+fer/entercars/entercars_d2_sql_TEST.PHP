<?php
session_start();

  // Create connection
    $dbconnect = mysqli_connect("127.0.0.1", "root", "", "dealer_two");
    
    // Check connection
    if ($dbconnect->connect_error) 
    {
        die("Connection failed: " . $dbconnect->connect_error);
    } 

$vehicle_no = filter_input(INPUT_POST, 'vehicle_no');
$model = filter_input(INPUT_POST, 'model');
$color = filter_input(INPUT_POST, 'color');
$autotrans = filter_input(INPUT_POST, 'autotrans');
$warehouse = filter_input(INPUT_POST, 'warehouse');
$financed = filter_input(INPUT_POST, 'financed');


$sql1 = "INSERT INTO autos (vehicle_no, model, color, autotrans, warehouse,financed)
VALUES ('$vehicle_no', '$model', '$color', '$autotrans', '$warehouse','$financed')";


    $email = $_POST['email'];
    $name = $_POST['fname'];

if ($dbconnect->query($sql1) === TRUE) 
    {
        $_SESSION['name'] = $email;
        $_SESSION['fname'] = $name;
        header('Location: entercars_d2_page_TEST.php');
    } else 
    {
        //echo "Something went wrong" . "<br>" . $dbconnect->error;
        header('Location: index.php');
    }
$dbconnect->close();
?>