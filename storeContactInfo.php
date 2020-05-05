<?php
    session_start();

    $dbconnect = mysqli_connect("127.0.0.1", "root", "csci318project", "globalviews");

    $name = filter_input(INPUT_POST, 'name');
    $address = filter_input(INPUT_POST, 'address');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email');

    $pin = "C";
    
    //Assign random pin to new sales representative
    $i = 0; $digits = 5;
    while($i < $digits)
    {
        //generate a random number between 0 and 9.
        $pin .= mt_rand(1, 9);
        $i++;
    }

    // Check connection
    if ($dbconnect->connect_error)
    {
        die("Connection failed: " . $dbconnect->connect_error);
    }

    $sql = "INSERT INTO potential_buyer (buyer_no, name, address, phone, email)
    VALUES ('$pin', '$name', '$address', '$phone', '$email')";

    if ($dbconnect->query($sql) === TRUE)
    {
        echo "<script>alert('Thank you!'); window.location.href='index.html';</script>";
    } else
    {
        echo "<script>alert('You already filled one'); window.location.href='contactUs.html';</script>";
    }

    $dbconnect->close();
?>
