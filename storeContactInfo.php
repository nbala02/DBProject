<?php
    session_start();

    include('dbconnect.php');

    $email = filter_input(INPUT_POST, 'email');
    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    $phone = filter_input(INPUT_POST, 'phone');
    $streetaddress = filter_input(INPUT_POST, 'streetaddress');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $zipcode = filter_input(INPUT_POST, 'zipcode');

    // Check connection
    if ($dbconnect->connect_error)
    {
        die("Connection failed: " . $dbconnect->connect_error);
    }

    $sql = "INSERT INTO contactInfo (email, fname, lname, phone, streetaddress, city, state, zipcode)
    VALUES ('$email', '$fname', '$lname', '$phone', '$streetaddress', '$city', '$state', '$zipcode')";

    if ($dbconnect->query($sql) === TRUE)
    {
        echo "<script>alert('Thank you!'); window.location.href='index.html';</script>";
    } else
    {
        echo "<script>alert('You already filled one'); window.location.href='contactUs.html';</script>";
    }

    $dbconnect->close();
?>
