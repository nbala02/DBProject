<?php
    session_start();

    include('dbconnect.php');

    if (isset($_POST['username']) and isset($_POST['password']))
    {
        //Assigning posted values to variables.
        $id = $_POST['username'];
        $password = $_POST['password'];
        $dealer = $_POST['radio'];
            
        //Checking if the values exist in the database or not
        $query = "SELECT * FROM customer WHERE username='$id' and password='$password'";

        $result = mysqli_query($dbconnect, $query) or die(mysqli_error($dbconnect));
        $count = mysqli_num_rows($result);
        $row  = mysqli_fetch_array($result);

        if(is_array($row))
        {
            $location = $row['location'];
        }

        //If the posted values are equal to the database values, then session will be created for the user.
        if ($count == 1 && $dealer == $location)
        {
            $_SESSION['customer'] = $id;

            if(is_array($row))
            {
                $_SESSION["fname"] = $row['fname'];
                if($location == "D1")
                {
                    $_SESSION['customer_no'] = $row['customer_no'];
                } else
                {
                    $_SESSION['buyer_no'] = $row['customer_no'];
                }
            }
        } else
        {
            //If the login credentials doesn't match, reload the page
            //echo "Something went wrong" . "<br>" . $dbconnect->error;
            //header("Location: signIn.html");
            echo "<script>alert('Username, Password, or Location is incorrect'); window.location.href='signIn.html';</script>";
        }
    }

    //If the user is logged in go to account dashboard
    if (isset($_SESSION['customer']))
    {
        header("Location: custAccount.html");
    }
?>
