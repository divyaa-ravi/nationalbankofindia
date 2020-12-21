<!DOCTYPE html>
<html lang="en">
 <head>
	<meta charset="utf-8">
	<meta name="viewport" content=width-device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	
 </head>
 <body>
 

  <?php
     $connection = mysqli_connect("localhost","root","");
     $db = mysqli_select_db($connection, 'intern');

     $query = "SELECT * FROM customer";
     $query_run = mysqli_query($connection, $query);
   ?>

  <div class="container"> 
	 <div class="jumbotron">
		<div class="card">
			
      <div class="card-header">
        National Bank of India 
      </div>

      <div class="card-body">
      <h5 class="card-title">Customer Details</h5>
      <table class="table table-dark table-bordered ">  
       <thead>
        <tr>
          <th scope="col">Customer Id</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Account type</th>
          <th scope="col">Current Balance</th>
          <th class="text-right">Action</th>
        </tr>
       </thead>

       <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
       ?>
       <tbody>
        <tr>
          <td> <?php echo $row['id']; ?> </td>                            
          <td> <?php echo $row['name']; ?> </td>                            
          <td> <?php echo $row['email']; ?> </td>                            
          <td> <?php echo $row['account_type']; ?> </td>
          <td> <?php echo $row['balance']; ?> </td>
          <td><a href="moneytransfer.php?id=<?php echo $row['id'];?>"><button class="btn btn-info">Send</button></a></td>     
        </tr>
                  
        <?php           
           }
          }
          else
          {
           echo "No Record Found";
          }
        ?>
       </tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>