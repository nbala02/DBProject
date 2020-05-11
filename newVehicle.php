<?php
    session_start();

    include('dbconnect.php');

    $serial = filter_input(INPUT_POST, 'serial');
    $model = filter_input(INPUT_POST, 'model');
    $color = filter_input(INPUT_POST, 'color');
    $autotrans = filter_input(INPUT_POST, 'autotrans');
    $warehouse = filter_input(INPUT_POST, 'warehouse');

    $global = mysqli_connect("127.0.0.1", "root", "", "globalviews");
    $sql = "SELECT model FROM rebate_Global WHERE model = '$model'";
    $output = $global->query($sql);
    echo $sql;
    if($output->num_rows != 0)
    {
        $answer = 'Yes';
    } else
    {
        $answer = 'No';
    }

    if(isset($_SESSION['ldmanager1']))
    {
        $connection = mysqli_connect("127.0.0.1", "root", "", "dealer_one");
        $sql = "INSERT INTO cars (serial_no, model, color, autotrans, warehouse, rebate)
                    VALUES ('$serial', '$model', '$color', '$autotrans', '$warehouse', '$answer')";
    } else if(isset($_SESSION['ldmanager2']))
    {
        $connection = mysqli_connect("127.0.0.1", "root", "", "dealer_two");
        $sql = "INSERT INTO autos (vehicle_no, model, color, autotrans, warehouse, rebate)
                    VALUES ('$serial', '$model', '$color', '$autotrans', '$warehouse', '$answer')";
    }

    if ($connection->query($sql) === TRUE) 
    {
        echo "<script>alert('New Vehicle Added'); window.location.href='empAccount.html';</script>";
    } else
    {
        //echo "Something went wrong" . "<br>" . $connection->error;
        echo "<script>alert('Vehicle already exists'); window.location.href='addVehicle.html';</script>";
    }
?>
