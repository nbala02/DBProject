<?php
    session_start();

    include('dbconnect.php');

    $serial = filter_input(INPUT_POST, 'serial');
    $model = filter_input(INPUT_POST, 'model');
    $color = filter_input(INPUT_POST, 'color');
    $autotrans = filter_input(INPUT_POST, 'autotrans');
    $warehouse = filter_input(INPUT_POST, 'warehouse');

    if(isset($_SESSION['ldmanager1']))
    {
        $connection = mysqli_connect("127.0.0.1", "root", "", "dealer_one");
        $sql = "INSERT INTO cars (serial_no, model, color, autotrans, warehouse)
                    VALUES ('$serial', '$model', '$color', '$autotrans', '$warehouse')";
    } else if(isset($_SESSION['ldmanager2']))
    {
        $connection = mysqli_connect("127.0.0.1", "root", "", "dealer_two");
        $sql = "INSERT INTO autos (vehicle_no, model, color, autotrans, warehouse)
                    VALUES ('$serial', '$model', '$color', '$autotrans', '$warehouse')";
    }

    if ($connection->query($sql) === TRUE) 
    {
        echo "<script>alert('New Vehicle Added'); window.location.href='empAccount.html';</script>";
    } else
    {
        //echo "Wrong Code" . "<br>" . $connection->error;
        echo "<script>alert('Vehicle already exists'); window.location.href='addVehicle.html';</script>";
    } 
?>
