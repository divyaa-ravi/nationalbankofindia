<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content=width-device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="foot.css">  

  <style> 
body {margin: 0; font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}



.container {
  position: relative;
  width: auto;
}

 
.topnav {
  overflow: hidden;
  background-color: #383838;
  
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 36px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}
</style>
<body>

 


  <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'intern');

                $query="SELECT * FROM customer where id=(SELECT sender_id FROM sender WHERE serial_number IN(SELECT MAX(serial_number) FROM sender GROUP BY sender_id)ORDER BY serial_number DESC LIMIT 1)";
                 
                $query_run = mysqli_query($connection, $query);
                
            ?>

<div class="container"> 
  <div class="jumbotron">
    <div class="card">
      
         <div class="card-header">
              National Bank of India 
         </div><br>
         <div class="card-body">
           <h5 class="card-title">From</h5>
         
           <br>

           <form action="insert.php" method="post">
            <table class="table table-light table-striped ">  
 
             <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
             ?>
             <tbody>

                  <tr>
                    <th><b>Customer Id</b></th>
                    <td><input type="number" class="form-control" name="sender_id"       value='<?php echo $row['id']; ?>'readonly></td>
                    <th><b>Name</b></th>    
                    <td><input type="text" class="form-control" name="sender_name"  value='<?php echo $row['name']; ?>'readonly'></td>
                  </tr>

                  <tr>  
                    <th><b>Current Balance</b></th>                          
                    <td> <?php echo $row['balance']; ?> </td>  
                    <th><b>IFSC Code</b></th>                          
                    <td> <?php echo $row['ifsc_code']; ?> </td>  
                  </tr>

                  <tr>
                    <th><b>Phone</b></th>                          
                    <td> <?php echo $row['phone']; ?> </td>
                    <th><b>Account Number</b></th>                          
                    <td><?php echo $row['account_number']; ?> </td>  
                  </tr>
             </tbody> 
               <?php           
                    }
                 }
                 else 
                 {
                    echo "No Record Found";
                }
               ?>
 
           </table>
         </div>
 
          <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'intern');

                $id1=$_GET['id'];

                $query = "SELECT * FROM customer where id='$id1'";
                $query_run = mysqli_query($connection, $query);
                
          ?>
         <div class="card-body">
           <h5 class="card-title">To</h5>
           <br>     
       

           <table class="table table-light table-striped ">  
 
            <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
            <tbody>
                  <tr>
                     <th><b>Customer Id</b></th>
                     <td><input type="number" class="form-control" name="receiver_id" value='<?php echo $row['id']; ?>'required> </td>  
                     <th><b>Name</b></th>    
                     <td><input type="text" class="form-control" name="receiver_name" value='<?php echo $row['name']; ?>'required> </td>
                  </tr>

                  <tr>  
                     <th><b>Current Balance</b></th>                          
                     <td> <?php echo $row['balance']; ?> </td>  
                     <th><b>IFSC Code</b></th>                          
                     <td> <?php echo $row['ifsc_code']; ?> </td>
                  </tr>

                  <tr>
                     <th><b>Phone</b></th>                          
                     <td> <?php echo $row['phone']; ?> </td>
                     <th><b>Account Number</b></th>                          
                     <td> <?php echo $row['account_number']; ?> </td> 
                  </tr>

                  <tr>
                     <th><b>Amount</b></th>                          
                     <td><input type="number" id="amount" name="amount" required></td>
                     <th><b>Message</b></th>                          
                     <td><input type="text" id="message" name="message" required></td>  
                  </tr>
                           
                           
                  <tr>  
                     <th><a href="home.php"><button type="button" class="btn btn-success">Cancel</button></a> </th>
                     <th></th>
                     <td></td>                           
                     <td><button type="submit" name="transfer_popup" class="btn btn-danger">Transfer Money</button></td>  
                  </tr>
            </tbody>
                          
             <?php           
                    }
                }
                else 
                {
                    echo "No Record Found";
                }
             ?>
           </table> 
      </form>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
