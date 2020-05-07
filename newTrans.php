<?php
    session_start();

    //Basic Info
    $cust_no = filter_input(INPUT_POST, 'cust_no');
    $name = filter_input(INPUT_POST, 'name');
    $address = filter_input(INPUT_POST, 'address');
    $phone = filter_input(INPUT_POST, 'phone');

    //Transaction Details
    $date = filter_input(INPUT_POST, 'date');
    $rebate = filter_input(INPUT_POST, 'rebate');
    $serial = filter_input(INPUT_POST, 'serial');
    $amount = filter_input(INPUT_POST, 'amount');
    $package_no = filter_input(INPUT_POST, 'package_no');

    //Loan Information
    $loan = filter_input(INPUT_POST, 'loan');
    $start = filter_input(INPUT_POST, 'start');
    $end = filter_input(INPUT_POST, 'end');
    $months = filter_input(INPUT_POST, 'months');
    $balance = filter_input(INPUT_POST, 'balance');

    //Generate a random pin for customer number and deal numbers
    $custNo = "C";
    $dealNo = "D";
    $empNo = $_SESSION["emp_no"];

    //Assign random pin number deal number to all transactions and customer number to all new customers
    if($cust_no == "new")
    {
        $i = 0; $digits = 5;
        while($i < $digits)
        {
            //generate a random number between 0 and 9.
            $custNo .= mt_rand(1, 9);
            $dealNo .= mt_rand(1, 9);
            $i++;
        }
    } else
    {
        $custNo = $cust_no;

        $i = 0; $digits = 5;
        while($i < $digits)
        {
            $dealNo .= mt_rand(1, 9);
            $i++;
        }
    }

    //Get necessary information from multiple tables
    if(isset($_SESSION['salesrep1']))
    {
        $connect = mysqli_connect("127.0.0.1", "root", "", "dealer_one");
        $query = "SELECT * FROM cars WHERE serial_no = '$serial'";
        $query1 = "SELECT * FROM customer_d1 WHERE name='$name' AND address='$address' AND phone='$phone'";
        $query2 = "SELECT model FROM rebate1 WHERE rebate_no = '$rebate'";
    } else if(isset($_SESSION['salesrep2']))
    {
        $connect = mysqli_connect("127.0.0.1", "root", "", "dealer_two");
        $query = "SELECT * FROM autos WHERE vehicle_no = '$serial'";
        $query1 = "SELECT * FROM customer_d2 WHERE name='$name' AND address='$address' AND phone='$phone'";
        $query2 = "SELECT model FROM rebate2 WHERE rebate_no = '$rebate'";
    }

    //Select from the vehicle tables and assign necessary values to variables
    $result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_assoc($result))
    {
        $model = $row['model'];
        $color = $row['color'];
        $autotrans = $row['autotrans'];
        $warehouse = $row['warehouse'];
    }

    //If the customer is not new check if inputed basic info matches the info of the selected $cust_no
    if($cust_no != "new")
    {
        $result1 = mysqli_query($connect, $query1);  //Select from customer tables

        if(($result1->num_rows == 0))
        {
            //echo "Something went wrong" . "<br>" . $connect->error;
            echo "<script>alert('Name, address, or phone does not match existing record');
                   window.location.href='addTrans.html';</script>";
            exit();
        }
    }

    //If a rebate has been selected Check to see if the model matches the model of the vehicle being bought
    if($rebate != "")
    {
        $result2 = mysqli_query($connect, $query2);
        while($row = mysqli_fetch_assoc($result2))
        {
            $rebateModel = $row['model'];
        }

        if($rebateModel != $model)
        {
            echo "<script>alert('Model of selected rebate does not match model of vehicle being purchased');
                    window.location.href='addTrans.html';</script>";
            exit();
        }
    }

    //Adding all of the posted information into the appropriate tables
    if(isset($_SESSION['salesrep1']))
    {
        $connection = mysqli_connect("127.0.0.1", "root", "", "dealer_one");

        //Insert the information into the appropriate tables
        if($cust_no == "new")
        {
            //Only add to the customer table if the customer is new
            $sql1 = "INSERT INTO customer_d1 (customer_no, name, address, phone)
                        VALUES ('$custNo', '$name', '$address', '$phone')";
        }

        $sql2 = "INSERT INTO purchased_cars (serial_no, model, color, autotrans, warehouse, amount)
                    VALUES ('$serial', '$model', '$color', '$autotrans', '$warehouse', '$amount')";

        $sql3 = "INSERT INTO loan (serial_no, customer_no, amount, start_date, end_date, months, balance)
                    VALUES ('$serial', '$custNo', '$amount', '$start', '$end', '$months', '$balance')";

        $sql4 = "INSERT INTO transaction (deal_no, rebate_no, package_no, rep_no, customer_no, serial_no, amount, fin_amt, date)
                    VALUES ('$dealNo', '$rebate', '$package_no', '$empNo', '$custNo', '$serial', '$amount', '$loan', '$date')";

        $sql5 = "DELETE FROM cars where serial_no = '$serial'";

    } else if(isset($_SESSION['salesrep2']))
    {
        $connection = mysqli_connect("127.0.0.1", "root", "", "dealer_two");

        //Insert the information into the appropriate tables
        if($cust_no == "new")
        {
            //Only add to the customer table if the customer is new
            $sql1 = "INSERT INTO customer_d2 (buyer_no, name, address, phone)
                        VALUES ('$custNo', '$name', '$address', '$phone')";
        }

        $sql2 = "INSERT INTO purchased_autos (vehicle_no, model, color, autotrans, warehouse, amount)
                    VALUES ('$serial', '$model', '$color', '$autotrans', '$warehouse', '$amount')";

        $sql3 = "INSERT INTO finance (vehicle_no, buyer_no, amount, start_date, end_date, months, balance)
                    VALUES ('$serial', '$custNo', '$amount', '$start', '$end', '$months', '$balance')";

        $sql4 = "INSERT INTO deal (deal_no, rebate_no, package_no, sale_no, buyer_no, vehicle_no, amount, fin_amt, date)
                    VALUES ('$dealNo', '$rebate', '$package_no', '$empNo', '$custNo', '$serial', '$amount', '$loan', '$date')";

        $sql5 = "DELETE FROM autos where vehicle_no = '$serial'";
    }

    //Redirect if successfully added or alert if something went wrong
    if($cust_no == "new")
    {
        if ($connection->query($sql1) === TRUE && $connection->query($sql2) === TRUE && $connection->query($sql3) === TRUE
                && $connection->query($sql4) === TRUE && $connection->query($sql5) === TRUE)
        {
            echo "<script>alert('Transaction Successfully Made'); window.location.href='empAccount.html';</script>";
        } else
        {
            echo "Something went wrong" . "<br>" . $connection->error;
            //echo "<script>alert('Something went wrong'); window.location.href='addTrans.html';</script>";
        }
    } else
    {
        if ($connection->query($sql2) === TRUE && $connection->query($sql3) === TRUE
                && $connection->query($sql4) === TRUE && $connection->query($sql5) === TRUE)
        {
            echo "<script>alert('Transaction Successfully Made'); window.location.href='empAccount.html';</script>";
        } else
        {
            echo "Something went wrong" . "<br>" . $connection->error;
            //echo "<script>alert('Something went wrong'); window.location.href='addTrans.html';</script>";
        }
    }
?>
