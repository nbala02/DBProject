<?php
    session_start();

    include('dbconnect.php');

    $package = filter_input(INPUT_POST, 'package');
    $description = filter_input(INPUT_POST, 'description');
    $price = filter_input(INPUT_POST, 'price');
    $mode = filter_input(INPUT_POST, 'mode');

    $connection = mysqli_connect("127.0.0.1", "root", "csci318project", "globalviews");
    $sql = "INSERT INTO add_on (package_no, package_description, price, mode_available)
            VALUES ('$package', '$description', '$price', '$mode')";

    if ($connection->query($sql) === TRUE) 
    {
        echo "<script>alert('New Package Added'); window.location.href='empAccount.html';</script>";
    }
    else 
    {
        //echo "Wrong Code" . "<br>" . $connection->error;
        echo "<script>alert('You already filled one'); window.location.href='addPackages.html';</script>";
    } 
?>
