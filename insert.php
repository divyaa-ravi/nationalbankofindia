 <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'intern');

if(isset($_POST['transfer_popup']))
{
$sid=$_POST['sender_id'];
$sname=$_POST['sender_name'];
$rid=$_POST['receiver_id'];
$rname=$_POST['receiver_name'];
$amount=$_POST['amount'];
$message=$_POST['message'];
$date=date('Y-m-d H:i:s');

 $sql = "SELECT * from customer where id=$sid";
    $query = mysqli_query($connection,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from customer where id=$rid";
    $query = mysqli_query($connection,$sql);
    $sql2 = mysqli_fetch_array($query);

  //if amount that we are gonna deduct from any user is
  // greater than the current credits available then print insufficient balance.
 if($amount > $sql1['balance'])
    {

        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }

     else if($amount == 0){
         echo "<script type='text/javascript'>alert('Enter Amount Greater than Zero');
    </script>";
     }
    else {

        //if not then deduct the credits from the user's account that we selected.
        $newCredit = $sql1['balance'] - $amount;
        $sql = "UPDATE customer set balance=$newCredit where id=$sid";
        mysqli_query($connection,$sql);



        $newCredit = $sql2['balance'] + $amount;
        $sql = "UPDATE customer set balance=$newCredit where id=$rid";
        mysqli_query($connection,$sql);

        
       
    
$query="INSERT INTO transfer (sender_id,sender_name,receiver_id,receiver_name,amount,message,date) VALUES ('$sid','$sname','$rid','$rname','$amount','$message','$date')";
$query_run=mysqli_query($connection,$query);

if($query_run)
{

     echo "<script type='text/javascript'>alert('Transaction Successful.');
    window.location='customer1.php';
     </script>";
    
    
}
else
{
     echo '<script> alert("Transaction failed"); </script>';   
}

 $newCredit= 0;
        $amount =0;
}
}
?>
