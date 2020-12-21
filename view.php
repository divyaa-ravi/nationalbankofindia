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
 </head>

 <body>



  <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'intern');

                $id1=$_GET['id'];

                 $query = "SELECT * FROM customer where id='$id1'";
                 $query1 = "INSERT INTO sender (sender_id) VALUES ('$id1')";
    
                $query_run = mysqli_query($connection, $query);
                $result=mysqli_query($connection,$query1);

  ?>

  <div class="container"> 
   <div class="jumbotron">
    <div class="card">
     <div class="card-header">
      National Bank of India 
     </div>

     <br>
     
     <div class="card-body">
      <h5 class="card-title">Customer Details</h5>
     
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
                   <img src="https://www.w3schools.com/w3css/img_avatar3.png" width="200px" height="200px">
                </tr>
                
                <br><br><br>

                <tr>
                   <th><b>Customer Id</b></th>
                   <td> <?php echo $row['id']; ?> </td>  
                   <th><b>Name</b></th>    
                   <td> <?php echo $row['name']; ?> </td>
                </tr>

                <tr>  
                   <th><b>Email</b></th>                          
                   <td> <?php echo $row['email']; ?> </td>  
                   <th><b>Account Type</b></th>                          
                   <td> <?php echo $row['account_type']; ?> </td>
                </tr>

                <tr>  
                   <th><b>Current Balance</b></th>                          
                   <td> <?php echo $row['balance']; ?> </td>  
                   <th><b>Branch</b></th>                          
                   <td> <?php echo $row['branch']; ?> </td>
                </tr>

                <tr>  
                   <th><b>IFSC Code</b></th>                          
                   <td> <?php echo $row['ifsc_code']; ?> </td>  
                   <th><b>Phone</b></th>                          
                   <td> <?php echo $row['phone']; ?> </td>
                </tr>

                <tr>  
                   <th><b>Account Number</b></th>                          
                   <td> <?php echo $row['account_number']; ?> </td>  
                   <th><b>Current Address</b></th>                          
                   <td> <?php echo $row['Address']; ?> </td>
                </tr>

                <tr>  
                   <th><a href="customer1.php"><button type="button" class="btn btn-success">Back</button></a></th>
                   <th></th>
                   <td></td>                           
                   <td><a href="transfer.php"><button type="button" class="btn btn-danger">Transfer Money</button></a></td>  
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
    </div>
   </div>
  </div>
 </body>
</html>