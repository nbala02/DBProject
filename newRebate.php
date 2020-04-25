<?php
    session_start();

    include('dbconnect.php');

    $rebate = filter_input(INPUT_POST, 'rebate');
    $model = filter_input(INPUT_POST, 'model');
    $amount = filter_input(INPUT_POST, 'amount');
    $start = filter_input(INPUT_POST, 'start');
    $end = filter_input(INPUT_POST, 'end');

    if(isset($_SESSION['ldmanager1']))
    {
        $connection = mysqli_connect("127.0.0.1", "root", "", "dealer_one");
        $sql = "INSERT INTO rebate1 (rebate_no, model, rebate_amt, start_date, end_date)
                    VALUES ('$rebate', '$model', '$amount', '$start', '$end')";
    } else if(isset($_SESSION['ldmanager2']))
    {
        $connection = mysqli_connect("127.0.0.1", "root", "", "dealer_two");
        $sql = "INSERT INTO rebate2 (rebate_no, model, rebate_amt, start_date, end_date)
                    VALUES ('$rebate', '$model', '$amount', '$start', '$end)";
    }

    if ($connection->query($sql) === TRUE) 
    {
        echo "<script>alert('New Rebate Added'); window.location.href='empAccount.html';</script>";
    }
    else 
    {
        //echo "Wrong Code" . "<br>" . $connection->error;
        echo "<script>alert('You already filled one'); window.location.href='addRebate.html';</script>";
    } 
?>