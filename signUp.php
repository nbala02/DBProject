<?php
    session_start();

    include('dbconnect.php');

    $code = filter_input(INPUT_POST, 'cust_no');
    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    $email = filter_input(INPUT_POST, 'email');
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    $query = "SELECT * FROM customer WHERE cust_no = '$code'";
    $output = $dbconnect->query($query);

    if($output->num_rows != 0)
    {
        while($result = mysqli_fetch_assoc($output)) 
        {
            $id = $result['cust_no'];
        }
        
        if(isset($id) && $id == $code)
        {
            $sql = "INSERT INTO customeracc (fname, lname, email, username, password)
            VALUES ('$fname', '$lname', '$email', '$username', '$password')";

            $email = $_POST['email'];
            $name = $_POST['fname'];

            if ($dbconnect->query($sql) === TRUE) 
            {
                $_SESSION['name'] = $email;
                $_SESSION['fname'] = $name;
                header('Location: custAccount.html');
            } else 
            {
                //echo "Something went wrong" . "<br>" . $dbconnect->error;
                //header('Location: registerPage.html');
                echo "<script>alert('Something went wrong'); window.location.href='registerPage.html';</script>";
            }
            
            $dbconnect->close();  
        }
    } else
    {
        //echo "Wrong Code" . "<br>" . $dbconnect->error;
        //header('Location: register.html');
        echo "<script>alert('Incorrect Customer ID'); window.location.href='registerPage.html';</script>";
    }  
?>
