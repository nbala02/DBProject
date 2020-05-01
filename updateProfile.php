 <?php
    session_start();

    include('dbconnect.php');

    if(isset($_SESSION['customer_no']))
    {
        $dbconnect = mysqli_connect("127.0.0.1", "root", "", "dealer_one");
        $query = "UPDATE customer_d1 SET name= '$_POST[name]',address= '$_POST[address]',phone= '$_POST[phone]' WHERE customer_no= '$_POST[customer_no]'";

        $output = $dbconnect->query($query);
    } else if(isset($_SESSION['buyer_no']))
    {
        $dbconnect = mysqli_connect("127.0.0.1", "root", "", "dealer_two");
        $query = "UPDATE customer_d1 SET name= '$_POST[name]',address= '$_POST[address]',phone= '$_POST[phone]' WHERE customer_no= '$_POST[buyer_no]'";

        $output = $dbconnect->query($query);
    }

    if($output === TRUE)
    {
        echo "<script>alert('Information has been updated'); window.location.href='custAccount.html';</script>";
    } else
    {
        //echo "Something went wrong" . "<br>" . $dbconnect->error;
        echo "<script>alert('Information has been updated'); window.location.href='viewProfile.html';</script>";
    }
?>
