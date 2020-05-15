<?php
    session_start();

    include('dbconnect.php');

    $rebate = filter_input(INPUT_POST, 'rebate');
    $model = filter_input(INPUT_POST, 'model');
    $amount = filter_input(INPUT_POST, 'amount');
    $start = filter_input(INPUT_POST, 'start');       
    $end = filter_input(INPUT_POST, 'end');
    $yes = 'Yes';

    $global = mysqli_connect("127.0.0.1", "root", "", "globalviews");
    $query = "SELECT model FROM rebate_Global WHERE model = '$model'";
    $output = $global->query($query);

    if($output->num_rows == 0)
    {
        if(isset($_SESSION['ldmanager1']))
        {
            $connection = mysqli_connect("127.0.0.1", "root", "", "dealer_one");
            $sql = "INSERT INTO rebate1 (rebate_no, model, rebate_amt, start_date, end_date, expired)
                        VALUES ('$rebate', '$model', '$amount', '$start', '$end', '0')";
            $sql2 = "UPDATE cars SET rebate = '$yes' WHERE model = '$model'";
        } else if(isset($_SESSION['ldmanager2']))
        {
            $connection = mysqli_connect("127.0.0.1", "root", "", "dealer_two");
            $sql = "INSERT INTO rebate2 (rebate_no, model, rebate_amt, start_date, end_date, expired)
                        VALUES ('$rebate', '$model', '$amount', '$start', '$end', '0')";
            $sql2 = "UPDATE autos SET rebate = '$yes' WHERE model = '$model'";
        }

        if ($connection->query($sql) === TRUE && $connection->query($sql2) === TRUE)
        {
            echo "<script>alert('New Rebate Added'); window.location.href='empAccount.html';</script>";

        } else
        {
            //echo "Something went wrong" . "<br>" . $connection->error;
            echo "<script>alert('Something went wrong'); window.location.href='addRebate.html';</script>";
        }
    } else
    {
        //echo "Something went wrong" . "<br>" . $global->error;
        echo "<script>alert('A rebate is currently being offered for that model already'); window.location.href='addRebate.html';</script>";
    }
?>
