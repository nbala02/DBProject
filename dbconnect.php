<?php
    //Create connection
    $dbconnect = mysqli_connect("127.0.0.1", "root", "", "testingDB");

    //This section is for the addTrans.html page
    if(isset($_SESSION['salesrep1']) || isset($_SESSION['salesrep2']))
    {
        if(isset($_SESSION['salesrep1']))
        {
            $connect = mysqli_connect("127.0.0.1", "root", "", "dealer_one");
            $query1 = "SELECT rebate_no, expired FROM rebate1";
            $query2 = "SELECT serial_no FROM cars";
            $connectGlobal = mysqli_connect("127.0.0.1", "root", "", "globalviews");
            $query3 = "SELECT package_no FROM add_on";

        } else if(isset($_SESSION['salesrep2']))
        {
            $connect = mysqli_connect("127.0.0.1", "root", "", "dealer_two");
            $query1 = "SELECT rebate_no, expired FROM rebate2";
            $query2 = "SELECT vehicle_no FROM autos";
            $connectGlobal = mysqli_connect("127.0.0.1", "root", "", "globalviews");
            $query3 = "SELECT package_no FROM add_on";
        }

        $result1 = mysqli_query($connect, $query1);
        $result2 = mysqli_query($connect, $query2);
        $result3 = mysqli_query($connectGlobal, $query3);

        //Check connection
        if($connect->connect_error)
        {
            die("Connection failed: " . $connect->connect_error);
        }
    }

    //Check connection
    if ($dbconnect->connect_error)
    {
        die("Connection failed: " . $dbconnect->connect_error);
    }
?>
