<?php

session_start();

//Basic Info
$name = filter_input(INPUT_POST, 'name');
$address = filter_input(INPUT_POST, 'address');
$phone = filter_input(INPUT_POST, 'phone');

//Transaction Details
$date = filter_input(INPUT_POST, 'date');
$rebate = filter_input(INPUT_POST, 'rebate');
$serial = filter_input(INPUT_POST, 'serial');
$amount = filter_input(INPUT_POST, 'amount');

//Loan Information
$loan = filter_input(INPUT_POST, 'loan');
$start = filter_input(INPUT_POST, 'start');
$end = filter_input(INPUT_POST, 'end');
$months = filter_input(INPUT_POST, 'months');
$balance = filter_input(INPUT_POST, 'balance');


$custNo = "C";
$dealNo = "D";
$empNo = $_SESSION["emp_no"];

$i = 0; $digits = 5;
while($i < $digits)
{
    //generate a random number between 0 and 9.
    $custNo .= mt_rand(1, 9);
    $dealNo .= mt_rand(1, 9);
    $i++;
}

if(isset($_SESSION['salesrep1']))
{
    $connection = mysqli_connect("127.0.0.1", "root", "", "dealer_one");

    //Insert the information into the appropriate tables
    $sql1 = "INSERT INTO customer_d1 (customer_no, name, address, phone)
                VALUES ('$custNo', '$name', '$address', '$phone')";

    $sql2 = "INSERT INTO loan (serial_no, customer_no, amount, start_date, end_date, months, balance)
                VALUES ('$serial', '$custNo', '$amount', '$start', '$end', '$months', '$balance')";

    $sql3 = "INSERT INTO transaction (deal_no, rebate_no, rep_no, customer_no, serial_no, amount, fin_amt, date)
                VALUES ('$dealNo', '$rebate', '$empNo', '$custNo', '$serial', '$amount', '$loan', '$date')";

    $sql4 = "DELETE FROM cars where serial_no = '$serial'";
;
} else if(isset($_SESSION['salesrep2']))
{
    $connection = mysqli_connect("127.0.0.1", "root", "", "dealer_two");

    //Insert the information into the appropriate tables
    $sql1 = "INSERT INTO customer_d2 (buyer_no, name, address, phone)
                VALUES ('$custNo', '$name', '$address', '$phone')";

    $sql2 = "INSERT INTO finance (vehicle_no, buyer_no, amount, start_date, end_date, months, balance)
                VALUES ('$serial', '$custNo', '$amount', '$start', '$end', '$months', '$balance')";

    $sql3 = "INSERT INTO deal (deal_no, rebate_no, sale_no, buyer_no, vehicle_no, amount, fin_amt, date)
                VALUES ('$dealNo', '$rebate', '$empNo', '$custNo', '$serial', '$amount', '$loan', '$date')";

    $sql4 = "DELETE FROM autos where vehicle_no = '$serial'";
}

if ($connection->query($sql1) === TRUE && $connection->query($sql2) === TRUE && $connection->query($sql3) === TRUE
        && $connection->query($sql4) === TRUE)
{
    echo "<script>alert('Transaction Successfully Made'); window.location.href='empAccount.html';</script>";
}
else
{
    //echo "Wrong Code" . "<br>" . $connection->error;
    echo "<script>alert('Something went wrong); window.location.href='addTrans.html';</script>";
}
?>
