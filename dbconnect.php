<?php
    //Create connection
    $dbconnect = mysqli_connect("127.0.0.1", "root", "", "user_accounts");
      
    //This section is for the addTrans.html page
    if(isset($_SESSION['salesrep1']) || isset($_SESSION['salesrep2']))
    {
        if(isset($_SESSION['salesrep1']))
        {
            $connect = mysqli_connect("127.0.0.1", "root", "", "dealer_one");
            $connectGlobal = mysqli_connect("127.0.0.1", "root", "", "globalviews");

            $query1 = "SELECT rebate_no, expired FROM rebate1";
            $query2 = "SELECT serial_no FROM cars";
            $query3 = "SELECT package_no FROM add_on";
            $query4 = "SELECT customer_no FROM customer_d1";

        } else if(isset($_SESSION['salesrep2']))
        {
            $connect = mysqli_connect("127.0.0.1", "root", "", "dealer_two");
            $connectGlobal = mysqli_connect("127.0.0.1", "root", "", "globalviews");

            $query1 = "SELECT rebate_no, expired FROM rebate2";
            $query2 = "SELECT vehicle_no FROM autos";
            $query3 = "SELECT package_no FROM add_on";
            $query4 = "SELECT buyer_no FROM customer_d2";
        }

        $result1 = mysqli_query($connect, $query1);             //Rebate No, Model, and Expired from rebate tables
        $result2 = mysqli_query($connect, $query2);             //Vehicle No from vehicle tables
        $result3 = mysqli_query($connectGlobal, $query3);       //Package No from add on table
        $result4 = mysqli_query($connect, $query4);             //Customer No from customer tables


        //Check connection
        if($connect->connect_error)
        {
            die("Connection failed: " . $connect->connect_error);
        }
    }

    //This section is for the addRebate.html and addVehicle.html pages
    if(isset($_SESSION['ldmanager1']) || isset($_SESSION['ldmanager2']))
    {
        /*if(isset($_SESSION['ldmanager1']))
        {
            $connect = mysqli_connect("127.0.0.1", "root", "", "dealer_one");
            $query5 = "SELECT model FROM cars";

        } else if(isset($_SESSION['ldmanager2']))
        {
            $connect = mysqli_connect("127.0.0.1", "root", "", "dealer_two");
            $query5 = "SELECT model FROM autos";
        }*/

        $connectGlobal = mysqli_connect("127.0.0.1", "root", "", "globalviews");
        $query6 = "SELECT model FROM model";

        //$result5 = mysqli_query($connect, $query5);         //Model from vehicle tables
        $result6 = mysqli_query($connectGlobal, $query6);   //Model from global model table

        //Check connection
        if ($dbconnect->connect_error)
        {
            die("Connection failed: " . $dbconnect->connect_error);
        }
    }
?>
