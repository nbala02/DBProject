 <?php

    session_start();

    include('dbconnect.php');

     if(isset($_SESSION['customer1']))
     {
          $dbconnect = mysqli_connect("127.0.0.1", "root", "", "dealer_one");


         $query1 = "UPDATE customer_d1 SET name='$_POST[name]',address= '$_POST[address]',phone= '$_POST[phone]' WHERE customer_no= '$_POST[customer_no]'";

         $output1 = $dbconnect->query($query1);

              echo $_SESSION['customer1'];
            echo 'customer_no';

     }


      /*  else if(isset($_SESSION['customer2']))
         {
        $dbconnect = mysqli_connect("127.0.0.1", "root", "", "dealer_two");
            $query2 = "UPDATE sales_person SET name= '$_POST[name]',address= '$_POST[address]',phone= '$_POST[phone]',comm= '$_POST[comm]', base_salary= '$_POST[base_salary]', ytdsales= '$_POST[ytdsales]' WHERE sale_no= '$_POST[sale_no]' ";
         $output2 = $dbconnect->query($query2);
         }
*/


if ($output1 === TRUE)
    {
       echo "wtf";
       //echo "<script>alert('Updated Info1'); //window.location.href='viewProfile.html';</script>";
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
       // echo "<script>alert('Updated for Dealer 2 '); window.location.href='viewRep.html';</script>";
    }
    else
    {
        //echo "Error";
        echo "Wrong Code" . "<br>" . $dbconnect->error;
        echo "Wrong Code" . "<br>" . $connection->error;
        //echo "<script>alert('You already filled one'); //window.location.href='addRep.html';</script>";
    }








?>
