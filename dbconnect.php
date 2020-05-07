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



        //rebate no from rebate1 dealer 1
        $result1 = mysqli_query($connect, $query1);
        //serial no from cars dealer 1
        $result2 = mysqli_query($connect, $query2);
        //package no from add ons globalview
        $result3 = mysqli_query($connectGlobal, $query3);


        //Check connection
        if($connect->connect_error)
        {
            die("Connection failed: " . $connect->connect_error);
        }
    }


if(isset($_SESSION['ldmanager1']) || isset($_SESSION['ldmanager2']))
    {


            if(isset($_SESSION['ldmanager1']))
        {
            $connect = mysqli_connect("127.0.0.1", "root", "", "dealer_one");
            $query5 = "SELECT model FROM cars";


        } else if(isset($_SESSION['ldmanager2']))
        {
            $connect = mysqli_connect("127.0.0.1", "root", "", "dealer_two");
            $query5 = "SELECT model FROM autos";

        }


            $connectGlobal = mysqli_connect("127.0.0.1", "root", "", "globalviews");
            $query4 = "SELECT model FROM model";


        //model from model (table) in globalview
        $result4 = mysqli_query($connectGlobal, $query4);
        //model from cars/autos from dealer1 or dealer2
        $result5 = mysqli_query($connect, $query5);



    //Check connection
    if ($dbconnect->connect_error)
    {
        die("Connection failed: " . $dbconnect->connect_error);
    }
}
?>
