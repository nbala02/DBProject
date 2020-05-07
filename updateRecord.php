 <?php
    session_start();

    include('dbconnect.php');

    if(isset($_SESSION['ldmanager1']))
    {
        $dbconnect = mysqli_connect("127.0.0.1", "root", "", "dealer_one");
        $query = "UPDATE representative SET name= '$_POST[name]',address= '$_POST[address]',phone= '$_POST[phone]',base_salary= '$_POST[base_salary]',ytd_sales= '$_POST[ytd_sales]',comm= '$_POST[comm]' WHERE rep_no= '$_POST[rep_no]'";

        $output = $dbconnect->query($query);
    } else if(isset($_SESSION['ldmanager2']))
    {
        $dbconnect = mysqli_connect("127.0.0.1", "root", "", "dealer_two");
        $query = "UPDATE sales_person SET name= '$_POST[name]',address= '$_POST[address]',phone= '$_POST[phone]',base_salary= '$_POST[base_salary]',ytdsales= '$_POST[ytdsales]',comm= '$_POST[comm]' WHERE sale_no= '$_POST[sale_no]'";

        $output = $dbconnect->query($query);
    }

    if ($output === TRUE)
    {
        echo "<script>alert('Information has been updated'); window.location.href='allReps.html';</script>";
    } else
    {
        //echo "Something went wrong" . "<br>" . $dbconnect->error;
        echo "<script>alert('Something went wrong'); window.location.href='empAccount.html';</script>";
    }
?>
