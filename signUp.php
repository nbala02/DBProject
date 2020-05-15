<?php
    session_start();

    include('dbconnect.php');
                          
    $code = filter_input(INPUT_POST, 'cust_no');
    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    $email = filter_input(INPUT_POST, 'email');
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $location = filter_input(INPUT_POST, 'location');

    $name = $fname . " " . $lname;

    if($location == "D1")
    {
        $connection = mysqli_connect("127.0.0.1", "root", "", "dealer_one");
        $sql = "SELECT * FROM customer_d1 WHERE customer_no = '$code'";
    } else if($location == "D2")
    {
        $connection = mysqli_connect("127.0.0.1", "root", "", "dealer_two");
        $sql = "SELECT * FROM customer_d2 WHERE buyer_no = '$code'";
    }

    $output = $connection->query($sql);

    if($output->num_rows != 0)
    {
        while($result = mysqli_fetch_assoc($output))
        {
            if($location == "D1")
            {
                $id = $result['customer_no'];
            } else if($location == "D2")
            {
                $id = $result['buyer_no'];
            }

            $fullName = $result['name'];
        }
        
        if((isset($id) && $id == $code) && (isset($fullName) && $fullName == $name)) 
        {
            $sql = "INSERT INTO customer (customer_no, fname, lname, email, username, password, location)
            VALUES ('$code', '$fname', '$lname', '$email', '$username', '$password', '$location')";

            $name = $_POST['fname'];

            if ($dbconnect->query($sql) === TRUE) 
            {
                $_SESSION['fname'] = $name;
                echo "<script>alert('Account successfully created! Go login.'); window.location.href='signIn.html';</script>";
            } else 
            {
                //echo "Something went wrong" . "<br>" . $dbconnect->error;
                //header('Location: registerPage.html');
                echo "<script>alert('Something went wrong'); window.location.href='registerPage.html';</script>";
            }
            
            $dbconnect->close();  
        } else
        {
            echo "<script>alert('Incorrect Name'); window.location.href='registerPage.html';</script>";
        }

    } else
    {
        //echo "Something went wrong" . "<br>" . $dbconnect->error;
        //header('Location: register.html');
        echo "<script>alert('Incorrect Customer ID or Location'); window.location.href='registerPage.html';</script>";
    }  
?>
