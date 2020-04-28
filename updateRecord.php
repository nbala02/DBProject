 <?php

    session_start();

    include('dbconnect.php');
     if(isset($_SESSION['ldmanager1']))
        {
          $dbconnect = mysqli_connect("127.0.0.1", "root", "", "dealer_one");
         $query1 = "UPDATE representative SET name= '$_POST[name]',address= '$_POST[address]',phone= '$_POST[phone]',base_salary= '$_POST[base_salary]',ytd_sales= '$_POST[ytd_sales]',comm= '$_POST[comm]' WHERE rep_no= '$_POST[rep_no]' ";
         $output1 = $dbconnect->query($query1);


         }
        else if(isset($_SESSION['ldmanager2']))
         {
        $dbconnect = mysqli_connect("127.0.0.1", "root", "", "dealer_two");
            $query2 = "UPDATE sales_person SET name= '$_POST[name]',address= '$_POST[address]',phone= '$_POST[phone]',comm= '$_POST[comm]', base_salary= '$_POST[base_salary]', ytdsales= '$_POST[ytdsales]' WHERE sale_no= '$_POST[sale_no]' ";
         $output2 = $dbconnect->query($query2);
         }



if ($output1 === TRUE)
    {
        echo "<script>alert('Updated for Dealer 1'); window.location.href='viewRep.html';</script>";
    }
    else
    {
        //echo "Error";
        echo "Wrong Code" . "<br>" . $dbconnect->error;
        echo "Wrong Code" . "<br>" . $connection->error;
        //echo "<script>alert('You already filled one'); //window.location.href='addRep.html';</script>";
    }

if ($output2 === TRUE)
    {
        echo "<script>alert('Updated for Dealer 2 '); window.location.href='viewRep.html';</script>";
    }
    else
    {
        //echo "Error";
        echo "Wrong Code" . "<br>" . $dbconnect->error;
        echo "Wrong Code" . "<br>" . $connection->error;
        //echo "<script>alert('You already filled one'); //window.location.href='addRep.html';</script>";
    }








?>
