<?php
    session_start();

    include('dbconnect.php');

    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    $email = filter_input(INPUT_POST, 'email');
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    $sql = "INSERT INTO wsmanager (fname, lname, email, username, password)
    VALUES ('$fname', '$lname', '$email', '$username', '$password')";

    $email = $_POST['email'];
    $name = $_POST['fname'];

    if ($dbconnect->query($sql) === TRUE) 
    {
        $_SESSION['name'] = $email;
        $_SESSION['fname'] = $name;
        header('Location: index.html');
    } else 
    {
        //echo "Something went wrong" . "<br>" . $dbconnect->error;
        header('Location: registerPage.html');
    }

    $dbconnect->close();    
?>