<?php
session_start();

include('dbconnect.php');

if (isset($_POST['email']) and isset($_POST['password']))
{
    //Assigning posted values to variables.
    $id = $_POST['email'];
    $password = $_POST['password'];
    $position = $_POST['radio'];
    
    //Checking if the values exist in the database or not
    $query = "SELECT * FROM employee WHERE email='$id' and password='$password'";

    $result = mysqli_query($dbconnect, $query) or die(mysqli_error($dbconnect));
    $count = mysqli_num_rows($result);
    $row  = mysqli_fetch_array($result);
    
    //Make sure position selected matches actual position
    if(is_array($row))
    {
        $emp_no = $row['emp_no'];
    }
    
    switch ($emp_no[0]) 
    {
        case "W":
            $emp_no = "wsmanager";
            break;
        case "L":
            $emp_no = "ldmanager";
            break;
        case "S":
            $emp_no = "salesrep";
            break;
        case "E":
            $emp_no = "employee";
            break;
    }
    
    //If the posted values are equal to the database values, then session will be created for the user.
    if ($count == 1 && $position == $emp_no)
    {
        switch ($position) 
        {
            case "wsmanager":
                $_SESSION['wsmanager'] = $id;
                break;
            case "ldmanager":
                $_SESSION['ldmanager'] = $id;
                break;
            case "salesrep":
                $_SESSION['salesrep'] = $id;
                break;
            case "employee":
                $_SESSION['employee'] = $id;
                break;
        }
        
        if(is_array($row))
        {
            $_SESSION["fname"] = $row['fname'];
        } 
    } else
    {
        //If the login credentials doesn't match, reload the page
        //echo "Something went wrong" . "<br>" . $dbconnect->error;
        //header("Location: signIn.html");
        echo "<script>alert('Something does not match, try again.'); window.location.href='empSignin.html';</script>";
    }
}

//If the user is logged in go to account dashboard
if (isset($_SESSION['wsmanager']) || isset($_SESSION['ldmanager']) || isset($_SESSION['salesrep']) || isset($_SESSION['employee']))
{
    header("Location: empaccount.html");
}
?>
