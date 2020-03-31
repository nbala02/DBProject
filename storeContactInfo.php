<?php
session_start();

$email = filter_input(INPUT_POST, 'email');
$fname = filter_input(INPUT_POST, 'fname');
$lname = filter_input(INPUT_POST, 'lname');
$phone = filter_input(INPUT_POST, 'phone');
$streetaddress = filter_input(INPUT_POST, 'streetaddress');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$zipcode = filter_input(INPUT_POST, 'zipcode');

// Create connection
$dbconnect = mysqli_connect("127.0.0.1", "root", "csci318project", "testingDB");
// Check connection
if ($dbconnect->connect_error) {
    die("Connection failed: " . $dbconnect->connect_error);
} 

$sql = "INSERT INTO contactInfo (email, fname, lname, phone, streetaddress, city, state, zipcode)
VALUES ('$email', '$fname', '$lname', '$phone', '$streetaddress', '$city', '$state', '$zipcode')";

if ($dbconnect->query($sql) === TRUE) {
    echo "Thank You";
}
else {
    echo "Try Again -_-" . "<br>" . $dbconnect->error;
}

$dbconnect->close();
?>