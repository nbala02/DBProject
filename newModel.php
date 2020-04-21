<?php
    session_start();

    include('dbconnect.php');

    $model = filter_input(INPUT_POST, 'model');
    $price = filter_input(INPUT_POST, 'price');
    $type = filter_input(INPUT_POST, 'type');
    $mileage = filter_input(INPUT_POST, 'mileage');
    $seat = filter_input(INPUT_POST, 'seat');
    $engine = filter_input(INPUT_POST, 'engine');

    $connection = mysqli_connect("127.0.0.1", "root", "csci318project", "global_tables");
    $sql = "INSERT INTO model (model, price, type, gas_mileage, seat, engine)
            VALUES ('$model', '$price', '$type', '$mileage', '$seat', '$engine')";

    if ($connection->query($sql) === TRUE) 
    {
        echo "<script>alert('New Model Added'); window.location.href='empAccount.html';</script>";
    }
    else 
    {
        //echo "Wrong Code" . "<br>" . $connection->error;
        echo "<script>alert('You already filled one'); window.location.href='addModel.html';</script>";
    } 
?>