<?php
    // Create connection
    $dbconnect = mysqli_connect("127.0.0.1", "root", "csci318project", "testingDB");

    //Check if connection worked
    /*if($dbconnect){
    echo 'Connected';   
    }
    else {
    echo 'Failed\n';  
    }*/

    //Read the JSON file
    $jsondata = file_get_contents('Employee.json');
    //$jsondata = file_get_contents('Customer.json');

    //Decode JSON data
    $data = json_decode((utf8_encode($jsondata)), true);
    var_dump($data);

    if(is_array($data))
    {
        echo "is array";
        foreach($data as $row)
        {
            ///////////FOR EMPLOYEES//////////////
            $i = 0; $digits = 5;
            
            //Fetch details of product
            $fname = $row["fname"];
            $lname = $row["lname"];
            $email = $row["email"];
            $password = $row["password"];
            $position = $row["position"];
            $location = $row["location"];
            
            switch ($position) {
                case "Wholesale Manager":
                    $pin = "W";
                    break;
                case "Local Manager":
                    $pin = "L";
                    break;
                case "Sales Representative":
                    $pin = "S";
                    break;
                default:
                    echo "Invalid position";
            }
            
            while($i < $digits){
                //generate a random number between 0 and 9.
                $pin .= mt_rand(1, 9);
                $i++;
            }
            
            //echo $pin;
            
            //Inserting fetched data
            $query = "INSERT INTO employee (emp_no, fname, lname, email, password, location) VALUES ('$pin', '$fname', '$lname', '$email', '$password', '$location')";
            
            ///////////FOR CUSTOMERS//////////////
            /*Fetch details of product
            $custno = $row["cust_no"];
            $fname = $row["fname"];
            $lname = $row["lname"];
            $email = $row["email"];
        
            //Inserting fetched data
            $query = "INSERT INTO customer (cust_no, fname, lname, email) VALUES ('$custno', '$fname', '$lname', '$email')";

            if(!(mysqli_query($dbconnect, $query))) 
            { 
                die('Error : Query Not Executed. Please Fix the Issue! ' . mysqli_error($dbconnect)); 
            } else
            { 
                echo "Data Inserted Successully!!!"; 
            }*/
            
            if(!(mysqli_query($dbconnect, $query))) 
            { 
                die('Error : Query Not Executed. Please Fix the Issue! ' . mysqli_error($dbconnect)); 
            } else
            { 
                echo "Data Inserted Successully!!!"; 
            }
            
        }
    }else
    {
        echo "not array";
    }
?>


